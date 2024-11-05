<?php declare(strict_types=1);

namespace Stormannsgal\AppTest\Service;

use PHPUnit\Framework\TestCase;
use Stormannsgal\App\Service\AuthenticationService;
use Stormannsgal\Mock\Constants\Account;

class AuthenticationServiceTest extends TestCase
{
    private AuthenticationService $service;

    protected function setUp(): void
    {
        $this->service = new AuthenticationService();
    }

    public function testPasswordComparisonIsSuccessful(): void
    {
        $compare = $this->service->isPasswordMatch(Account::PASSWORD_STRING, Account::PASSWORD);

        $this->assertTrue($compare);
    }

    public function testPasswordComparisonFails(): void
    {
        $compare = $this->service->isPasswordMatch(Account::PASSWORD_STRING, Account::PASSWORD_INVALID);

        $this->assertFalse($compare);
    }
}
