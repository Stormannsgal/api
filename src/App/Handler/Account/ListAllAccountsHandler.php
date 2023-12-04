<?php declare(strict_types=1);

namespace Stormannsgal\App\Handler\Account;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Fig\Http\Message\StatusCodeInterface as HTTP;
use OpenApi\Attributes as OA;
use Psr\Http\Server\RequestHandlerInterface;

class ListAllAccountsHandler implements RequestHandlerInterface
{
    #[OA\Get(
        path: '/api/account/list/all',
        description: 'All accounts are listed in the list. Whether active, inactive, banned or deleted',
        summary: 'Listing of all accounts',
        tags: ['Account'],
        responses: [
            new OA\Response(
                response: HTTP::STATUS_OK,
                description: 'Success',
            ),
        ]
    )]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse([], HTTP::STATUS_OK);
    }
}
