<?php declare(strict_types=1);

namespace Stormannsgal\App\DTO;

use OpenApi\Attributes as OA;

#[OA\Schema()]
readonly class AuthenticationResponse
{
    public function __construct(
        #[OA\Property(
            description: 'The access token after a valid log-in',
            type: 'string',
        )]
        public string $accessToken,
        #[OA\Property(
            description: 'The refresh token after a valid log-in',
            type: 'string',
        )]
        public string $refreshToken,
    ) {
    }

    public static function from(AccessToken $accessToken, RefreshToken $refreshToken): self
    {
        return new self($accessToken->accessToken, $refreshToken->refreshToken);
    }
}
