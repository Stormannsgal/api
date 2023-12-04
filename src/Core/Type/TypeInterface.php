<?php declare(strict_types=1);

namespace Stormannsgal\Core\Type;

use JsonSerializable;
use Serializable;

interface TypeInterface extends JsonSerializable, Serializable
{
    public function toString(): string;

    public function __toString(): string;
}
