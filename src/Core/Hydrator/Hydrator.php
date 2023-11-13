<?php declare(strict_types=1);

namespace Stormannsgal\Core\Hydrator;

use function array_diff;
use function array_keys;

abstract class Hydrator
{
    abstract public function hydrate(array $data): object;
}
