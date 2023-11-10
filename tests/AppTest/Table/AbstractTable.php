<?php declare(strict_types=1);

namespace Stormannsgal\AppTest\Table;

use PHPUnit\Framework\TestCase;
use Stormannsgal\Core\Table\AbstractTable as ATable;
use Stormannsgal\CoreTest\Mock\Database\MockQuery;

use function get_class;
use function substr;

abstract class AbstractTable extends TestCase
{
    private const TABLE_NAME_OFFSET = 20;
    private const TABLE_SUB_LENGTH = -4;

    protected MockQuery $query;
    protected ATable $table;

    protected function setUp(): void
    {
        $this->query = new MockQuery();

        $this->table = new (
            'Stormannsgal\App' . substr(get_class($this), self::TABLE_NAME_OFFSET, self::TABLE_SUB_LENGTH)
        )(
            $this->query
        );
    }
}
