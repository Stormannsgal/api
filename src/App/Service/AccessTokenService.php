<?php declare(strict_types=1);

namespace Stormannsgal\App\Service;

use Firebase\JWT\JWT;
use Stormannsgal\App\DTO\JwtTokenConfig;
use Stormannsgal\Core\Entity\AccountInterface;

use function time;

readonly class AccessTokenService
{
    use JwtTokenTrait;

    public function __construct(
        private JwtTokenConfig $config,
    ) {
    }

    public function generate(AccountInterface $account): string
    {
        $now = time();

        $payload = [
            'iss' => $this->config->iss,
            'aud' => $this->config->aud,
            'iat' => $now,
            'exp' => $now + $this->config->duration,
            'uuid' => $account->getUuid()->getHex()->toString(),
        ];

        return JWT::encode($payload, $this->config->key, $this->config->algorithmus);
    }
}
