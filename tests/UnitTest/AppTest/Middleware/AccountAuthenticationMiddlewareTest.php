<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\AppTest\Middleware;

use Fig\Http\Message\StatusCodeInterface as HTTP;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Ramsey\Uuid\Uuid;
use Stormannsgal\App\Middleware\AccountAuthenticationMiddleware;
use Stormannsgal\App\Service\AccessTokenService;
use Stormannsgal\Core\Repository\AccountRepositoryInterface;
use Stormannsgal\FunctionalTest\Mock\NullLogger;
use Stormannsgal\UnitTest\Mock\Constants\Account;
use Stormannsgal\UnitTest\Mock\MockAccountAuthenticationMiddlewareRequestHandler;
use Stormannsgal\UnitTest\Mock\Repository\MockAccountRepository;
use Stormannsgal\UnitTest\Mock\Repository\MockAccountRepositoryAccountAuthenticationMiddlewareInvalidToken;
use Stormannsgal\UnitTest\Mock\Service\MockAccessTokenService;
use Stormannsgal\UnitTest\Mock\Service\MockAccessTokenServiceWithoutDuration;

use function json_decode;
use function property_exists;

use const JSON_THROW_ON_ERROR;

class AccountAuthenticationMiddlewareTest extends AbstractTestMiddleware
{
    private AccessTokenService $accessTokenService;
    private AccountRepositoryInterface $accountRepository;
    private LoggerInterface $logger;

    protected function setUp(): void
    {
        parent::setUp();
        $this->accessTokenService = new MockAccessTokenService();
        $this->accountRepository = new MockAccountRepository();
        $this->logger = new NullLogger();
    }

    public function testAccountAuthenticatedIsGuest(): void
    {
        $middleware = new AccountAuthenticationMiddleware(
            $this->accessTokenService,
            $this->accountRepository,
            $this->logger
        );
        $handler = new MockAccountAuthenticationMiddlewareRequestHandler();
        $response = $middleware->process($this->request, $handler);
        $header = $response->getHeaderLine('Authorization');

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(JsonResponse::class, $response);
        $this->assertSame('', $header);
    }

    public function testAccountSuccessfulAuthenticated(): void
    {
        $accessToken = $this->accessTokenService->generate(Uuid::fromString(Account::UUID));
        $request = $this->request->withHeader('Authorization', $accessToken);

        $middleware = new AccountAuthenticationMiddleware(
            $this->accessTokenService,
            $this->accountRepository,
            $this->logger
        );

        $handler = new MockAccountAuthenticationMiddlewareRequestHandler();
        $response = $middleware->process($request, $handler);
        $header = $response->getHeaderLine('Authorization');

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(JsonResponse::class, $response);
        $this->assertSame('true', $header);
    }

    public function testTokenHasExpired(): void
    {
        $accessTokenService = new MockAccessTokenServiceWithoutDuration();
        $accessToken = $accessTokenService->generate(Uuid::fromString(Account::UUID));
        $request = $this->request->withHeader('Authorization', $accessToken);

        $middleware = new AccountAuthenticationMiddleware(
            $this->accessTokenService,
            $this->accountRepository,
            $this->logger
        );

        $response = $middleware->process($request, $this->handler);
        $json = json_decode((string)$response->getBody(), null, 512, JSON_THROW_ON_ERROR);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertSame(HTTP::STATUS_UNAUTHORIZED, $response->getStatusCode());
        $this->assertTrue(property_exists($json, 'message') && $json->message === 'Token expired');
    }

    public function testTokenHasInvalid(): void
    {
        $accessToken = $this->accessTokenService->generate(Uuid::fromString(Account::UUID));
        $request = $this->request->withHeader('Authorization', $accessToken);
        $accountRepository = new MockAccountRepositoryAccountAuthenticationMiddlewareInvalidToken();
        $middleware = new AccountAuthenticationMiddleware(
            $this->accessTokenService,
            $accountRepository,
            $this->logger
        );

        $response = $middleware->process($request, $this->handler);
        $json = json_decode((string)$response->getBody(), null, 512, JSON_THROW_ON_ERROR);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertSame(HTTP::STATUS_UNAUTHORIZED, $response->getStatusCode());
        $this->assertTrue(property_exists($json, 'message') && $json->message === 'Token invalid');
    }
}
