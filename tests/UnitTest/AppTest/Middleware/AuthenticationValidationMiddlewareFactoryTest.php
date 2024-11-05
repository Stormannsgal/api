<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\AppTest\Middleware;

use PHPUnit\Framework\TestCase;
use Stormannsgal\App\Middleware\AuthenticationValidationMiddleware;
use Stormannsgal\App\Middleware\AuthenticationValidationMiddlewareFactory;
use Stormannsgal\Core\Validator\AuthenticationValidator;
use Stormannsgal\UnitTest\Mock\MockContainer;
use Stormannsgal\UnitTest\Mock\Validator\MockAuthenticationValidator;

class AuthenticationValidationMiddlewareFactoryTest extends TestCase
{
    public function testCanCreateAuthenticationMiddlewareInstance(): void
    {
        $container = new MockContainer(
            [
                AuthenticationValidator::class => new MockAuthenticationValidator(),
            ]
        );

        $middleware = (new AuthenticationValidationMiddlewareFactory())($container);

        $this->assertInstanceOf(AuthenticationValidationMiddleware::class, $middleware);
    }
}
