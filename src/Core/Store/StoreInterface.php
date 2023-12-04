<?php declare(strict_types=1);

namespace Stormannsgal\Core\Store;

interface StoreInterface
{
    public function findById(int $id): array;

    public function findAll(): array;
}
