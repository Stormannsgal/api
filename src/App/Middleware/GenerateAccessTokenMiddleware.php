<?php declare(strict_types=1);

namespace Stormannsgal\App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Stormannsgal\App\DTO\AccessToken;
use Stormannsgal\App\Service\AccessTokenService;
use Stormannsgal\Core\Entity\AccountInterface;

readonly class GenerateAccessTokenMiddleware implements MiddlewareInterface
{
    public function __construct(
        private AccessTokenService $accessTokenService,
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var AccountInterface $account */
        $account = $request->getAttribute(AccountInterface::AUTHENTICATED);

        $accessToken = $this->accessTokenService->generate($account->getUuid());

        $accessToken = AccessToken::fromString($accessToken);

        return $handler->handle($request->withAttribute(AccessToken::class, $accessToken));
    }
}
