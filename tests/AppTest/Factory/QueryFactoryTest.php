<?php declare(strict_types=1);

namespace AppTest\Factory;

use App\Factory\QueryFactory;
use AppTest\Mock\Database\MockPDO;
use AppTest\Mock\MockContainer;
use Envms\FluentPDO\Query;
use PDO;
use PHPUnit\Framework\TestCase;

class QueryFactoryTest extends TestCase
{
    public function testCanCreateQueryInstance(): void
    {
        $container = new MockContainer();
        $container->add(PDO::class, new MockPDO());

        $query = (new QueryFactory())($container);

        $this->assertInstanceOf(Query::class, $query);
    }
}
