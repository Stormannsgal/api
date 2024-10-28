<?php declare(strict_types=1);

namespace Stormannsgal\App\Middleware;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Stormannsgal\App\Service\AccessTokenService;
use Stormannsgal\Core\Repository\AccountRepositoryInterface;

class AccountAuthenticationMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): AccountAuthenticationMiddleware
    {
        $accessTokenService = $container->get(AccessTokenService::class);
        $accountRepository = $container->get(AccountRepositoryInterface::class);
        $loggerInterface = $container->get(LoggerInterface::class);

        return new AccountAuthenticationMiddleware(
            $accessTokenService,
            $accountRepository,
            $loggerInterface
        );
    }
}
