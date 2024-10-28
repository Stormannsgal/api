<?php declare(strict_types=1);

namespace Stormannsgal\App\Middleware;

use Fig\Http\Message\StatusCodeInterface as HTTP;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;
use Ramsey\Uuid\Uuid;
use Stormannsgal\App\DTO\AuthenticationFailureMessage;
use Stormannsgal\App\Service\AccessTokenService;
use Stormannsgal\Core\Entity\AccountInterface;
use Stormannsgal\Core\Repository\AccountRepositoryInterface;

use function strlen;

readonly class AccountAuthenticationMiddleware implements MiddlewareInterface
{
    public function __construct(
        private AccessTokenService $accessTokenService,
        private AccountRepositoryInterface $accountRepository,
        private LoggerInterface $logger
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $authorization = $request->getHeaderLine('Authorization');

        if (strlen($authorization) === 0) {
            $this->logger->info('{Host} as {User} call -> {URI}', ['User' => 'Guest',]);

            return $handler->handle($request);
        }

        if (!$this->accessTokenService->isValid($authorization)) {
            $this->logger->notice('{Host} has call {URI} with expired Access Token');

            $message = AuthenticationFailureMessage::create(HTTP::STATUS_UNAUTHORIZED, 'Token expired');

            return new JsonResponse($message, $message->statusCode);
        }

        $authorization = $this->accessTokenService->decode($authorization);
        $uuid = Uuid::fromString($authorization->uuid);
        $account = $this->accountRepository->findByUuid($uuid);

        if (!($account instanceof AccountInterface)) {
            $this->logger->notice('{Host} has call {URI} with invalid Access Token');

            $message = AuthenticationFailureMessage::create(HTTP::STATUS_UNAUTHORIZED, 'Token invalid');

            return new JsonResponse($message, $message->statusCode);
        }

        $this->logger->info('{Host} as {User} call -> {URI}', ['User' => $account->getName(),]);

        return $handler->handle($request->withAttribute(AccountInterface::AUTHENTICATED, $account));
    }
}
