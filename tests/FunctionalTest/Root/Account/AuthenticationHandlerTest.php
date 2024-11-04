<?php declare(strict_types=1);

namespace Stormannsgal\FunctionalTest\Root\Account;

use Fig\Http\Message\StatusCodeInterface as HTTP;
use Laminas\Diactoros\ServerRequest;
use PHPUnit\Framework\Attributes\DataProvider;
use Stormannsgal\FunctionalTest\AbstractFunctional;
use Stormannsgal\Mock\Constants\Account;

use function rand;

class AuthenticationHandlerTest extends AbstractFunctional
{
    public static function validAccountDataProvider(): array
    {
        return [
            'Owner' => ['owner@example.com', 'owner123456'],
            'Administrator' => ['admin@example.com', 'admin123456'],
            'Moderator' => ['moderator@example.com', 'moderator'],
            'User' => ['user@example.com', 'user123456'],
            'Valid fixed Account Constant' => [Account::EMAIL, Account::PASSWORD_STRING,],
        ];
    }

    public static function invalidAuthenticateDataProvider(): array
    {
        return [
            'Empty Fields' => ['', ''],
            'Empty E-Mail' => ['', '123456'],
            'Empty Password' => ['account@example.com', ''],
            'No E-Mail' => ['no E-Mail', '123456'],
            'Invalid email prefixe' => ['abc..def@mail.com', '123456'],
            'Password too Short' => ['account@example.com', '123'],
            'Password too Long' => [
                'account@example.com',
                '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111'
                . '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111'
                . '111111111111111111111111111111111111111111111111111111',
            ],
            'Account with bad Password' => ['owner@example.com', '123456'],
            'SQL Injection Comment' => ["owner@example.com'--", '123456'],
        ];
    }

    #[DataProvider('validAccountDataProvider')]
    public function testCanAuthenticate(string $email, string $password): void
    {
        $request = new ServerRequest(
            uri: '/api/account/authentication',
            method: 'POST'
        );
        $request = $request->withParsedBody(['email' => $email, 'password' => $password])
            ->withAddedHeader('x-ident', (string)rand());
        $response = $this->app->handle($request);

        $this->assertSame(HTTP::STATUS_OK, $response->getStatusCode());
    }

    #[DataProvider('invalidAuthenticateDataProvider')]
    public function testAuthenticateFailed(string $email, string $password): void
    {
        $request = new ServerRequest(
            uri: '/api/account/authentication',
            method: 'POST'
        );
        $request = $request->withParsedBody(['email' => $email, 'password' => $password])
            ->withAddedHeader('x-ident', (string)rand());
        $response = $this->app->handle($request);

        $this->assertSame(HTTP::STATUS_BAD_REQUEST, $response->getStatusCode());
    }

    public function testNoDoubleSameLogins(): void
    {
        $request = new ServerRequest(
            uri: '/api/account/authentication',
            method: 'POST'
        );
        $request = $request->withParsedBody(['email' => 'owner@example.com', 'password' => 'owner123456'])
            ->withAddedHeader('x-ident', (string)rand());

        $response = $this->app->handle($request);
        $this->assertSame(HTTP::STATUS_OK, $response->getStatusCode());

        $response = $this->app->handle($request);
        $this->assertSame(HTTP::STATUS_BAD_REQUEST, $response->getStatusCode());
    }

    public function testAccountIsAlreadyAuthenticated(): void
    {
        $request = new ServerRequest(
            uri: '/api/account/authentication',
            method: 'POST'
        );
        $request = $request->withParsedBody(['email' => 'owner@example.com', 'password' => 'owner123456'])
            ->withAddedHeader('x-ident', (string)rand())
            ->withAddedHeader('Authentication', 'Authentication');

        $response = $this->app->handle($request);
        $this->assertSame(HTTP::STATUS_FORBIDDEN, $response->getStatusCode());
    }

    public function testAccountIsAlreadyAuthorized(): void
    {
        $request = new ServerRequest(
            uri: '/api/account/authentication',
            method: 'POST'
        );
        $request = $request->withParsedBody(['email' => 'admin@example.com', 'password' => 'admin123456'])
            ->withAddedHeader('x-ident', (string)rand())
            ->withAddedHeader('Authorization', 'Authorization');

        $response = $this->app->handle($request);
        $this->assertSame(HTTP::STATUS_UNAUTHORIZED, $response->getStatusCode());
    }
}
