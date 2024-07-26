<?php declare(strict_types=1);

namespace Stormannsgal\Core\Trait;

trait CloneReadonlyClassWith
{
    /** @phpstan-ignore-next-line */
    public function with(...$properties): static
    {
        $properties += (array)$this;

        /** @phpstan-ignore-next-line */
        return new static(...$properties);
    }
}
