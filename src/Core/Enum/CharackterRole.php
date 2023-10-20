<?php declare(strict_types=1);

namespace Stormannsgal\Core\Enum;

enum CharackterRole: int
{
    case DEALER = 1;
    case PIRATE = 2;
    case PRODUCER = 3;

    public function getRoleName(): string
    {
        return match ($this) {
            CharackterRole::DEALER => 'Händler',
            CharackterRole::PIRATE => 'Pirat',
            CharackterRole::PRODUCER => 'Hersteller'
        };
    }
}
