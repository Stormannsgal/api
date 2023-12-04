<?php declare(strict_types=1);

namespace AppTest\Repository;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Stormannsgal\App\Hydrator\AccountHydrator;
use Stormannsgal\App\Repository\AccountRepository;
use Stormannsgal\Core\Entity\AccountCollectionInterface;
use Stormannsgal\Core\Entity\AccountInterface as AccountInterface;
use Stormannsgal\Core\Exception\EmptyResultException;
use Stormannsgal\Core\Type\Email;
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
        $uuid = Uuid::fromString(Account::UUID);
        $account = $this->repository->findByUuid($uuid);

        $this->assertInstanceOf(AccountInterface::class, $account);
        $this->assertSame(Account::UUID, $account->getUuid()->getHex()->toString());
    }

    public function testFindByUuidThrowException(): void
    {
        $this->expectException(EmptyResultException::class);

        $uuid = Uuid::fromString(Account::UUID_INVALID);
        $this->repository->findByUuid($uuid);
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
        $account = $this->repository->findByEmail(new Email(Account::EMAIL));

        $this->assertInstanceOf(AccountInterface::class, $account);
        $this->assertSame(Account::EMAIL, $account->getEMail()->toString());
    }

    public function testFindByEmailThrowException(): void
    {
        $this->expectException(EmptyResultException::class);

        $this->repository->findByEmail(new Email(Account::EMAIL_INVALID));
    }

    public function testCanFindAll(): void
    {
        $accounts = $this->repository->findAll();

        $this->assertInstanceOf(AccountCollectionInterface::class, $accounts);
        $this->assertInstanceOf(AccountInterface::class, $accounts[0]);
    }
}
