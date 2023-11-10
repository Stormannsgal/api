<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

interface Capital
{
    public function getCapital(): int;

    public function __toString(): string;
}
