<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\AppTest\Middleware;

use PHPUnit\Framework\TestCase;
use Stormannsgal\App\Middleware\GenerateRefreshTokenMiddleware;
use Stormannsgal\App\Middleware\GenerateRefreshTokenMiddlewareFactory;
use Stormannsgal\App\Service\RefreshTokenService;
use Stormannsgal\UnitTest\Mock\MockContainer;
use Stormannsgal\UnitTest\Mock\Service\MockRefreshTokenService;

class GenerateRefreshTokenMiddlewareFactoryTest extends TestCase
{
    public function testCanCreateGenerateRefreshTokenMiddlewareInstance(): void
    {
        $container = new MockContainer([
            RefreshTokenService::class => new MockRefreshTokenService(),
        ]);

        $middleware = (new GenerateRefreshTokenMiddlewareFactory())($container);

        $this->assertInstanceOf(GenerateRefreshTokenMiddleware::class, $middleware);
    }

}
