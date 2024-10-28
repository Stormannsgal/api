<?php declare(strict_types=1);

namespace Stormannsgal\Mock\Repository;

use Stormannsgal\App\Repository\AccountRepository;
use Stormannsgal\Mock\Table\MockAccountTable;
use Stormannsgal\Mock\Table\MockAccountTableAccountAuthenticationMiddlewareInvalidToken;

readonly class MockAccountRepositoryAccountAuthenticationMiddlewareInvalidToken extends AccountRepository
{
    public function __construct()
    {
        parent::__construct(new MockAccountTableAccountAuthenticationMiddlewareInvalidToken());
    }
}
