<?php declare(strict_types=1);

namespace Stormannsgal\CoreTest\Mock\Database;

use Envms\FluentPDO\Queries\Insert;
use Envms\FluentPDO\Query;

class MockInsert extends Insert
{
    public function __construct(Query $fluent, string $table, array $values)
    {
        parent::__construct($fluent, $table, $values);
    }

    public function execute($sequence = null): int|bool
    {
        return $this->handle($this->statements['INSERT INTO'], $this->statements['VALUES']);
    }

    private function handle(string $table, array $values): int|bool
    {
        return match($table) {
            default => false,
        };
    }
}
