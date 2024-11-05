<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\AppTest\Middleware;

use PHPUnit\Framework\TestCase;
use Stormannsgal\App\Middleware\GenerateAccessTokenMiddleware;
use Stormannsgal\App\Middleware\GenerateAccessTokenMiddlewareFactory;
use Stormannsgal\App\Service\AccessTokenService;
use Stormannsgal\UnitTest\Mock\MockContainer;
use Stormannsgal\UnitTest\Mock\Service\MockAccessTokenService;

class GenerateAccessTokenMiddlewareFactoryTest extends TestCase
{
    public function testCanCreateGenerateAccessTokenMiddlewareInstance(): void
    {
        $container = new MockContainer([
            AccessTokenService::class => new MockAccessTokenService(),
        ]);

        $middleware = (new GenerateAccessTokenMiddlewareFactory())($container);

        $this->assertInstanceOf(GenerateAccessTokenMiddleware::class, $middleware);
    }
}
