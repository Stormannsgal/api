<?php declare(strict_types=1);

namespace Stormannsgal\Mock\Service;

use Stormannsgal\App\DTO\JwtTokenConfig;
use Stormannsgal\App\Service\AccessTokenService;
use Stormannsgal\Core\Entity\AccountInterface;

readonly class MockAccessTokenService extends AccessTokenService
{
    public function __construct()
    {
        $config = new JwtTokenConfig('1', '1', 1, '1', '1');

        parent::__construct($config);
    }

    public function generate(AccountInterface $account): string
    {
        return 'test successfully';
    }
}
