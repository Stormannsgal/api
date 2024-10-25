<?php declare(strict_types=1);

namespace Stormannsgal\App\Service;

use Psr\Container\ContainerInterface;
use Stormannsgal\App\DTO\JwtTokenConfig;

class AccessTokenServiceFactory
{
    public function __invoke(ContainerInterface $container): AccessTokenService
    {
        $jwtTokenConfig = $container->get('config')['jwt_token']['access'];
        $jwtTokenConfig = JwtTokenConfig::createFromArray($jwtTokenConfig);

        return new AccessTokenService($jwtTokenConfig);
    }
}
