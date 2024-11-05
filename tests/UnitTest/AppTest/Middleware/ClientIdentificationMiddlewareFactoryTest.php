<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\AppTest\Middleware;

use PHPUnit\Framework\TestCase;
use Stormannsgal\App\Middleware\ClientIdentificationMiddleware;
use Stormannsgal\App\Middleware\ClientIdentificationMiddlewareFactory;
use Stormannsgal\App\Service\ClientIdentificationService;
use Stormannsgal\UnitTest\Mock\MockContainer;
use Stormannsgal\UnitTest\Mock\Service\MockClientIdentificationService;

class ClientIdentificationMiddlewareFactoryTest extends TestCase
{
    public function testCanCreateClientIdentificationMiddlewareInstance(): void
    {
        $container = new MockContainer(
            [
                ClientIdentificationService::class => new MockClientIdentificationService(),
            ]
        );

        $middleware = (new ClientIdentificationMiddlewareFactory())($container);

        $this->assertInstanceOf(ClientIdentificationMiddleware::class, $middleware);
    }
}
