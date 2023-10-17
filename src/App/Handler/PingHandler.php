<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use OpenApi\Attributes as OA;
use Fig\Http\Message\StatusCodeInterface as HTTP;

use function time;

class PingHandler implements RequestHandlerInterface
{
    #[OA\Get(
        path: '/api/ping',
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
                                description: 'actually time',
                                type: 'string'
                            )
                        ]
                    )
                ]
            )
        ]
    )]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse(['ack' => time()]);
    }
}
