<?php declare(strict_types=1);

namespace Stormannsgal\UnitTest\AppTest\Table;

use Envms\FluentPDO\Query;
use PHPUnit\Framework\TestCase;
use Stormannsgal\App\Hydrator\AccountHydrator;
use Stormannsgal\App\Hydrator\AccountHydratorInterface;
use Stormannsgal\App\Table\AccountTable;
use Stormannsgal\App\Table\AccountTableFactory;
use Stormannsgal\UnitTest\Mock\Database\MockQuery;
use Stormannsgal\UnitTest\Mock\MockContainer;

class AccountTableFactoryTest extends TestCase
{
    public function testCanCreateAccountTableInstance(): void
    {
        $container = new MockContainer();
        $container->add(Query::class, new MockQuery());
        $container->add(AccountHydratorInterface::class, new AccountHydrator());

        $accountTable = (new AccountTableFactory())($container);

        $this->assertInstanceOf(AccountTable::class, $accountTable);
    }
}
