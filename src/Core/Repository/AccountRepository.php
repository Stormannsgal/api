<?php declare(strict_types=1);

namespace Stormannsgal\Core\Repository;

use Stormannsgal\Core\Entity\Account;
use Stormannsgal\Core\Entity\AccountCollection;

interface AccountRepository
{
    public function findById(int $id): Account;

    public function findByUuid(string $uuid): Account;

    public function findByName(string $name): Account;

    public function findByEmail(string $email): Account;

    public function findAll(): AccountCollection;
}
