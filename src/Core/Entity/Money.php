<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

interface Money
{
    public function getMoney(): int;

    public function __toString(): string;
}
