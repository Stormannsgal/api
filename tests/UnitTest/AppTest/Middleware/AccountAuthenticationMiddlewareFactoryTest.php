<?php declare(strict_types=1);

namespace Stormannsgal\AppTest\Middleware;

use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Stormannsgal\App\Middleware\AccountAuthenticationMiddleware;
use Stormannsgal\App\Middleware\AccountAuthenticationMiddlewareFactory;
use Stormannsgal\App\Service\AccessTokenService;
use Stormannsgal\Core\Repository\AccountRepositoryInterface;
use Stormannsgal\FunctionalTest\Mock\NullLogger;
use Stormannsgal\Mock\MockContainer;
use Stormannsgal\Mock\Repository\MockAccountRepository;
use Stormannsgal\Mock\Service\MockAccessTokenService;

class AccountAuthenticationMiddlewareFactoryTest extends TestCase
{
    public function testCanCreateAccountAuthenticationMiddlewareInstance(): void
    {
        $container = new MockContainer(
            [
                AccessTokenService::class => new MockAccessTokenService(),
                AccountRepositoryInterface::class => new MockAccountRepository(),
                LoggerInterface::class => new NullLogger(),
            ]
        );

        $middleware = (new AccountAuthenticationMiddlewareFactory())($container);

        $this->assertInstanceOf(AccountAuthenticationMiddleware::class, $middleware);
    }
}
