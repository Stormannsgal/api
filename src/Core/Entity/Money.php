<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

class Money
{
    private int $bronze;
    private int $silver;
    private int $gold;

    public function toString(): string
    {
        return sprintf('Gold: %d - Silber: %d - Bronze: %d', $this->gold, $this->silver, $this->bronze);
    }
}
