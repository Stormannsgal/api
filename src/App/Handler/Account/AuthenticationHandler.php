<?php declare(strict_types=1);

namespace Stormannsgal\App\Handler\Account;

use Fig\Http\Message\StatusCodeInterface as HTTP;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Stormannsgal\App\DTO\AccessToken;
use Stormannsgal\App\DTO\AccountAuthenticationData;
use Stormannsgal\App\DTO\AuthenticationFailureMessage;
use Stormannsgal\App\DTO\AuthenticationResponse;
use Stormannsgal\App\DTO\RefreshToken;

readonly class AuthenticationHandler implements RequestHandlerInterface
{
    #[OA\Post(
        path: '/account/authentication',
        summary: 'Attempts to log in an account using transferred data',
        tags: ['Account']
    )]
    #[OA\RequestBody(
        description: 'Account data for authentication',
        required: true,
        content: new OA\JsonContent(ref: AccountAuthenticationData::class)
    )]
    #[OA\Response(
        response: HTTP::STATUS_OK,
        description: 'Success',
        content: [new OA\JsonContent(ref: AuthenticationResponse::class)]
    )]
    #[OA\Response(
        response: HTTP::STATUS_BAD_REQUEST,
        description: 'Bad Request',
        content: [new OA\JsonContent(ref: AuthenticationFailureMessage::class)]
    )]
    #[OA\Response(
        response: HTTP::STATUS_FORBIDDEN,
        description: 'Unauthorized access',
        content: [new OA\JsonContent(ref: AuthenticationFailureMessage::class)]
    )]
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $accessToken = $request->getAttribute(AccessToken::class);
        $refreshToken = $request->getAttribute(RefreshToken::class);

        $response = AuthenticationResponse::from($accessToken, $refreshToken);

        return new JsonResponse($response, HTTP::STATUS_OK);
    }
}
