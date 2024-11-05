<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\Mock\Service;

use Stormannsgal\App\Service\AuthenticationService;
use Stormannsgal\UnitTest\Mock\Constants\Account;

readonly class MockAuthenticationService extends AuthenticationService
{
    public function isPasswordMatch(string $password, string $hash): bool
    {
        return $password === Account::PASSWORD;
    }
}
