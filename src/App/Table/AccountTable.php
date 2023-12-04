<?php declare(strict_types=1);

namespace Stormannsgal\App\Table;

use Envms\FluentPDO\Exception;
use Ramsey\Uuid\UuidInterface;
use Stormannsgal\Core\Store\AccountStoreInterface;

use Stormannsgal\Core\Type\Email;

use function is_array;

class AccountTable extends AbstractTable implements AccountStoreInterface
{
    /**
     * @throws Exception
     */
    public function findByUuid(UuidInterface $uuid): array
    {
        $result = $this->query->from($this->table)
            ->where('uuid', $uuid->getHex()->toString())
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
    public function findByEmail(Email $email): array
    {
        $result = $this->query->from($this->table)
            ->where('email', $email->toString())
            ->fetch();

        return is_array($result) ? $result : [];
    }
}
