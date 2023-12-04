<?php declare(strict_types=1);

namespace Stormannsgal\Core\Hydrator;

abstract class Hydrator
{
    abstract public function hydrate(array $data): object;
}
