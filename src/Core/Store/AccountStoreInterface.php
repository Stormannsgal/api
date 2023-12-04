<?php declare(strict_types=1);

namespace Stormannsgal\Core\Store;

use Ramsey\Uuid\UuidInterface;
use Stormannsgal\Core\Type\Email;

interface AccountStoreInterface extends StoreInterface
{
    public function findByUuid(UuidInterface $uuid): array;

    public function findByName(string $name): array;

    public function findByEmail(Email $email): array;
}
