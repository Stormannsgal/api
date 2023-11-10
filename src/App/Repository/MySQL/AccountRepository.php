<?php declare(strict_types=1);

namespace Stormannsgal\App\Repository\MySQL;

use Stormannsgal\App\Entity\AccountCollection;
use Stormannsgal\App\Hydrator\AccountHydrator;
use Stormannsgal\App\Table\AccountTable;
use Stormannsgal\Core\Entity\Account;
use Stormannsgal\Core\Entity\AccountCollection as AccountCollectionInterface;
use Stormannsgal\Core\Exception\EmptyResultException;
use Stormannsgal\Core\Repository\AccountRepository as AccountRepositoryInterface;

use function sprintf;

readonly class AccountRepository implements AccountRepositoryInterface
{
    public function __construct(
        private AccountTable $table,
        private AccountHydrator $hydrator
    ) {
    }

    public function findById(int $id): Account
    {
        $account = $this->table->findById($id);

        if (empty($account)) {
            throw new EmptyResultException(
                sprintf('id %d not found in Account Repository', $id)
            );
        }

        return $this->hydrator->hydrate($account);
    }

    public function findByUuid(string $uuid): Account
    {
        $account = $this->table->findByUuid($uuid);

        if (empty($account)) {
            throw new EmptyResultException(
                sprintf('Uuid %s not found in Account Repository', $uuid)
            );
        }

        return $this->hydrator->hydrate($account);
    }

    public function findByName(string $name): Account
    {
        $account = $this->table->findByName($name);

        if (empty($account)) {
            throw new EmptyResultException(
                sprintf('Name %s not found in Account Repository', $name)
            );
        }

        return $this->hydrator->hydrate($account);
    }

    public function findByEmail(string $email): Account
    {
        $account = $this->table->findByEmail($email);

        if (empty($account)) {
            throw new EmptyResultException(
                sprintf('E-Mail %s not found in Account Repository', $email)
            );
        }

        return $this->hydrator->hydrate($account);
    }

    public function findAll(): AccountCollectionInterface
    {
        $accounts = $this->table->findAll();

        if (empty($accounts)) {
            throw new EmptyResultException();
        }

        $accountCollection = new AccountCollection();

        foreach ($accounts as $account) {
            $accountCollection[] = $this->hydrator->hydrate($account);
        }

        return $accountCollection;
    }
}
