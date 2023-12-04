<?php declare(strict_types=1);

namespace Stormannsgal\App\Table;

use Envms\FluentPDO\Exception;
use Envms\FluentPDO\Query;
use ReflectionClass;

use function is_array;
use function substr;

class AbstractTable
{
    protected readonly string $table;

    public function __construct(
        protected readonly Query $query
    ) {
        $this->table = substr((new ReflectionClass($this))->getShortName(), 0, -5);
    }

    public function getTableName(): string
    {
        return $this->table;
    }

    /**
     * @throws Exception
     */
    public function findById(int $id): array
    {
        $result = $this->query->from($this->table)
            ->where('id', $id)
            ->fetch();

        return is_array($result) ? $result : [];
    }

    /**
     * @throws Exception
     */
    public function findAll(): array
    {
        $result = $this->query->from($this->table)->fetchAll();

        return is_array($result) ? $result : [];
    }
}
