<?php declare(strict_types=1);

namespace Stormannsgal\CoreTest\Mock\Table;

use Stormannsgal\App\Table\AccountTable;
use Stormannsgal\CoreTest\Mock\Constants\Account;
use Stormannsgal\CoreTest\Mock\Database\MockQuery;

class MockAccountTable extends AccountTable
{
    public function __construct()
    {
        parent::__construct(new MockQuery());
    }

    public function getTableName(): string
    {
        return 'Account';
    }

    public function findById(int $id): array
    {
        return ($id === Account::ID) ? Account::VALID_DATA : [];
    }

    public function findAll(): array
    {
        return [0 => Account::VALID_DATA];
    }

    public function findByUuid(string $uuid): array
    {
        return ($uuid === Account::UUID) ? Account::VALID_DATA : [];
    }

    public function findByName(string $name): array
    {
        return ($name === Account::NAME) ? Account::VALID_DATA : [];
    }

    public function findByEmail(string $email): array
    {
        return ($email === Account::EMAIL) ? Account::VALID_DATA : [];
    }
}
