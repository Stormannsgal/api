<?php declare(strict_types=1);

namespace Stormannsgal\AppTest\Service;

use DomainException;
use PHPUnit\Framework\TestCase;
use Stormannsgal\App\DTO\JwtTokenConfig;
use Stormannsgal\App\Service\AccessTokenService;
use Stormannsgal\App\Service\RefreshTokenService;
use Stormannsgal\Core\Entity\AccountInterface;
use Stormannsgal\Mock\Constants\Token;
use Stormannsgal\Mock\Entity\MockAccount;

class AccessTokenServiceTest extends TestCase
{
    private AccountInterface $account;

    protected function setUp(): void
    {
        $this->account = new MockAccount();
    }

    public function testGenerateValidAccessToken(): void
    {
        $config = Token::getTokenStruct();
        $jwtTokenConfig = JwtTokenConfig::createFromArray($config);

        $service = new AccessTokenService($jwtTokenConfig);

        $token = $service->generate($this->account->getUuid());

        $isValid = $service->isValid($token);

        $this->assertTrue($isValid);
    }

    public function testGenerateValidAccessTokenFails(): void
    {
        $config = Token::getTokenStruct();
        $config['algorithmus'] = '';
        $jwtTokenConfig = JwtTokenConfig::createFromArray($config);

        $service = new AccessTokenService($jwtTokenConfig);

        $this->expectException(DomainException::class);

        $service->generate($this->account->getUuid());
    }
}
