<?php declare(strict_types=1);

namespace Stormannsgal\AppTest\Repository\MySQL;

use PHPUnit\Framework\TestCase;
use Stormannsgal\App\Hydrator\AccountHydrator;
use Stormannsgal\App\Repository\MySQL\AccountRepository;
use Stormannsgal\Core\Entity\Account as AccountInterface;
use Stormannsgal\Core\Entity\AccountCollection;
use Stormannsgal\Core\Exception\EmptyResultException;
use Stormannsgal\CoreTest\Mock\Constants\Account;
use Stormannsgal\CoreTest\Mock\Table\MockAccountTable;

class AccountRepositoryTest extends TestCase
{
    private AccountRepository $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new AccountRepository(new MockAccountTable(), new AccountHydrator());
    }

    public function testCanFindById(): void
    {
        $account = $this->repository->findById(Account::ID);

        $this->assertInstanceOf(AccountInterface::class, $account);
        $this->assertSame(Account::ID, $account->getId());
    }

    public function testFindByIdThrowException(): void
    {
        $this->expectException(EmptyResultException::class);

        $this->repository->findById(Account::ID_INVALID);
    }

    public function testCanFindByUuid(): void
    {
        $account = $this->repository->findByUuid(Account::UUID);

        $this->assertInstanceOf(AccountInterface::class, $account);
        $this->assertSame(Account::UUID, $account->getUuid());
    }

    public function testFindByUuidThrowException(): void
    {
        $this->expectException(EmptyResultException::class);

        $this->repository->findByUuid(Account::UUID_INVALID);
    }

    public function testCanFindByName(): void
    {
        $account = $this->repository->findByName(Account::NAME);

        $this->assertInstanceOf(AccountInterface::class, $account);
        $this->assertSame(Account::NAME, $account->getName());
    }

    public function testFindByNameThrowException(): void
    {
        $this->expectException(EmptyResultException::class);

        $this->repository->findByName(Account::NAME_INVALID);
    }

    public function testCanFindByEmail(): void
    {
        $account = $this->repository->findByEmail(Account::EMAIL);

        $this->assertInstanceOf(AccountInterface::class, $account);
        $this->assertSame(Account::EMAIL, $account->getEMail());
    }

    public function testFindByEmailThrowException(): void
    {
        $this->expectException(EmptyResultException::class);

        $this->repository->findByEmail(Account::EMAIL_INVALID);
    }

    public function testCanFindAll(): void
    {
        $accounts = $this->repository->findAll();

        $this->assertInstanceOf(AccountCollection::class, $accounts);
        $this->assertInstanceOf(AccountInterface::class, $accounts[0]);
    }
}
