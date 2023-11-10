<?php declare(strict_types=1);

namespace Stormannsgal\App\Table;

use Envms\FluentPDO\Exception;
use Stormannsgal\Core\Table\AbstractTable;

use function is_array;

class AccountTable extends AbstractTable
{
    /**
     * @throws Exception
     */
    public function findByUuid(string $uuid): array
    {
        $result = $this->query->from($this->table)
            ->where('uuid', $uuid)
            ->fetch();

        return is_array($result) ? $result : [];
    }

    /**
     * @throws Exception
     */
    public function findByName(string $name): array
    {
        $result = $this->query->from($this->table)
            ->where('name', $name)
            ->fetch();

        return is_array($result) ? $result : [];
    }

    /**
     * @throws Exception
     */
    public function findByEmail(string $email): array
    {
        $result = $this->query->from($this->table)
            ->where('email', $email)
            ->fetch();

        return is_array($result) ? $result : [];
    }
}
