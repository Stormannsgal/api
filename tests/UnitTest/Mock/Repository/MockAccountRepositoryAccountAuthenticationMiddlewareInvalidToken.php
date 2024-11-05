<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\Mock\Repository;

use Stormannsgal\App\Repository\AccountRepository;
use Stormannsgal\UnitTest\Mock\Table\MockAccountTableAccountAuthenticationMiddlewareInvalidToken;

readonly class MockAccountRepositoryAccountAuthenticationMiddlewareInvalidToken extends AccountRepository
{
    public function __construct()
    {
        parent::__construct(new MockAccountTableAccountAuthenticationMiddlewareInvalidToken());
    }
}
