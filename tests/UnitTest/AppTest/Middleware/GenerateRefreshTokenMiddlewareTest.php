<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\AppTest\Middleware;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Stormannsgal\App\DTO\ClientIdentification;
use Stormannsgal\App\DTO\ClientIdentificationData;
use Stormannsgal\App\Middleware\GenerateRefreshTokenMiddleware;
use Stormannsgal\UnitTest\Mock\Service\MockRefreshTokenService;

class GenerateRefreshTokenMiddlewareTest extends AbstractTestMiddleware
{
    private MiddlewareInterface $middleware;

    protected function setUp(): void
    {
        parent::setUp();

        $this->middleware = new GenerateRefreshTokenMiddleware(
            new MockRefreshTokenService()
        );
    }

    public function testCanGenerateRefreshToken(): void
    {
        $data = ClientIdentification::create(
            ClientIdentificationData::create(null, 'defaul'),
            '1'
        );

        $request = $this->request->withAttribute(ClientIdentification::class, $data);
        $response = $this->middleware->process($request, $this->handler);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(JsonResponse::class, $response);
    }
}
