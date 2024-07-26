<?php declare(strict_types=1);

namespace Stormannsgal\App\Repository;

use Ramsey\Uuid\UuidInterface;
use Stormannsgal\App\Entity\AccountCollection;
use Stormannsgal\App\Hydrator\AccountHydrator;
use Stormannsgal\Core\Entity\AccountCollectionInterface;
use Stormannsgal\Core\Entity\AccountInterface;
use Stormannsgal\Core\Exception\EmptyResultException;
use Stormannsgal\Core\Repository\AccountRepositoryInterface;
use Stormannsgal\Core\Store\AccountStoreInterface;
use Stormannsgal\Core\Type\Email;

use function sprintf;

readonly class AccountRepository implements AccountRepositoryInterface
{
    public function __construct(
        private AccountStoreInterface $store,
        private AccountHydrator $hydrator
    ) {
    }

    /**
     * @throws EmptyResultException
     * @throws \Exception
     */
    public function findById(int $id): AccountInterface
    {
        $account = $this->store->findById($id);

        if (empty($account)) {
            throw new EmptyResultException(
                sprintf('id %d not found in Account Repository', $id)
            );
        }

        return $this->hydrator->hydrate($account);
    }

    /**
     * @throws EmptyResultException
     * @throws \Exception
     */
    public function findByUuid(UuidInterface $uuid): AccountInterface
    {
        $account = $this->store->findByUuid($uuid);

        if (empty($account)) {
            throw new EmptyResultException(
                sprintf('Uuid %s not found in Account Repository', $uuid)
            );
        }

        return $this->hydrator->hydrate($account);
    }

    /**
     * @throws EmptyResultException
     * @throws \Exception
     */
    public function findByName(string $name): AccountInterface
    {
        $account = $this->store->findByName($name);

        if (empty($account)) {
            throw new EmptyResultException(
                sprintf('Name %s not found in Account Repository', $name)
            );
        }

        return $this->hydrator->hydrate($account);
    }

    /**
     * @throws EmptyResultException
     * @throws \Exception
     */
    public function findByEmail(Email $email): AccountInterface
    {
        $account = $this->store->findByEmail($email);

        if (empty($account)) {
            throw new EmptyResultException(
                sprintf('E-Mail %s not found in Account Repository', $email)
            );
        }

        return $this->hydrator->hydrate($account);
    }

    /**
     * @throws \Exception
     */
    public function findAll(): AccountCollectionInterface
    {
        $accounts = $this->store->findAll();
        $accountCollection = new AccountCollection();

        foreach ($accounts as $account) {
            $accountCollection[] = $this->hydrator->hydrate($account);
        }

        return $accountCollection;
    }
}
