<?php declare(strict_types=1);

namespace Stormannsgal\App\Handler;

use Fig\Http\Message\StatusCodeInterface as HTTP;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function time;

readonly class PingHandler implements RequestHandlerInterface
{
    #[OA\Get(
        path: '/ping',
        tags: ['System Information'],
        responses: [
            new OA\Response(
                response: HTTP::STATUS_OK,
                description: 'Success',
                content: [
                    new OA\JsonContent(
                        properties: [
                            new OA\Property(
                                property: 'ack',
                                description: 'actually request time',
                                type: 'string'
                            ),
                        ]
                    ),
                ]
            ),
        ]
    )]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse(['ack' => time()]);
    }
}
