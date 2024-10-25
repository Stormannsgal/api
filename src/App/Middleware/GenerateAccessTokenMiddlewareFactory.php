<?php declare(strict_types=1);

namespace Stormannsgal\App\Middleware;

use Psr\Container\ContainerInterface;
use Stormannsgal\App\Service\AccessTokenService;

class GenerateAccessTokenMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): GenerateAccessTokenMiddleware
    {
        $accessTokenService = $container->get(AccessTokenService::class);

        return new GenerateAccessTokenMiddleware($accessTokenService);
    }
}
