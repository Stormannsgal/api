<?php declare(strict_types=1);

namespace Stormannsgal\FunctionalTest\Root\Account;

use DateTimeImmutable;
use Fig\Http\Message\StatusCodeInterface;
use Laminas\Diactoros\ServerRequest;
use Ramsey\Uuid\Uuid;
use Stormannsgal\App\Entity\Account;
use Stormannsgal\App\Repository\AccountRepository;
use Stormannsgal\Core\Type\Email;
use Stormannsgal\FunctionalTest\FunctionalTestCase;
use Stormannsgal\Mock\Constants;

use function password_hash;
use function time;

use const PASSWORD_BCRYPT;

class AuthenticationHandlerTest extends FunctionalTestCase
{
    public function testDispatchRequest(): void
    {


        $request = new ServerRequest(uri: '/api/ping', method: 'GET');

        $response = $this->app->dispatchRequest($request);

        self::assertSame(StatusCodeInterface::STATUS_OK, $response->getStatusCode());
        self::assertJsonValueMatches(
            self::getContentAsJson($response),
            '$.ack',
            self::greaterThanOrEqual(time())
        );
    }
}
