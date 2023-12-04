<?php declare(strict_types=1);

namespace Stormannsgal\AppTest\Table;

use Envms\FluentPDO\Exception;
use Ramsey\Uuid\Uuid;
use Stormannsgal\App\Table\AccountTable;
use Stormannsgal\Core\Type\Email;
use Stormannsgal\CoreTest\Mock\Constants\Account;

/**
 * @property AccountTable $table
 */
class AccountTableTest extends AbstractTable
{
    public function testCanGetTableName(): void
    {
        $this->assertSame('Account', $this->table->getTableName());
    }

    /**
     * @throws Exception
     */
    public function testCanFindById(): void
    {
        $account = $this->table->findById(Account::ID);

        $this->assertIsArray($account);
        $this->assertSame(Account::VALID_DATA, $account);
    }

    /**
     * @throws Exception
     */
    public function testFindByIdIsEmpty(): void
    {
        $account = $this->table->findById(Account::ID_INVALID);

        $this->assertIsArray($account);
        $this->assertEmpty($account);
    }

    /**
     * @throws Exception
     */
    public function testCanFindByUuid(): void
    {
        $uuid = Uuid::fromString(Account::UUID);
        $account = $this->table->findByUuid($uuid);

        $this->assertIsArray($account);
        $this->assertSame(Account::VALID_DATA, $account);
    }

    /**
     * @throws Exception
     */
    public function testFindByUuidIsEmpty(): void
    {
        $uuid = Uuid::fromString(Account::UUID_INVALID);
        $account = $this->table->findByUuid($uuid);

        $this->assertIsArray($account);
        $this->assertEmpty($account);
    }

    public function testCanFindByName(): void
    {
        $account = $this->table->findByName(Account::NAME);

        $this->assertIsArray($account);
        $this->assertSame(Account::VALID_DATA, $account);
    }

    public function testFindByNameIsEmpty(): void
    {
        $account = $this->table->findByName(Account::NAME_INVALID);

        $this->assertIsArray($account);
        $this->assertEmpty($account);
    }

    public function testCanFindByEmail(): void
    {
        $account = $this->table->findByEmail(new Email(Account::EMAIL));

        $this->assertIsArray($account);
        $this->assertSame(Account::VALID_DATA, $account);
    }

    public function testFindByEmailIsEmpty(): void
    {
        $account = $this->table->findByEmail(new Email(Account::EMAIL_INVALID));

        $this->assertIsArray($account);
        $this->assertEmpty($account);
    }

    /**
     * @throws Exception
     */
    public function testCanFindAll(): void
    {
        $accounts = $this->table->findAll();

        $this->assertIsArray($accounts);
        $this->assertSame([ 0 => Account::VALID_DATA], $accounts);
    }
}
