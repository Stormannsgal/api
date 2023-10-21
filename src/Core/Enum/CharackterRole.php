<?php declare(strict_types=1);

namespace Stormannsgal\Core\Enum;

enum CharackterRole: int
{
    case PRODUCER = 1;
    case DEALER = 2;
    case PIRATE = 3;
    case BOUNTY_HUNTER = 4;

    public function getRoleName(): string
    {
        return match ($this) {
            CharackterRole::PRODUCER => 'Hersteller',
            CharackterRole::DEALER => 'Händler',
            CharackterRole::PIRATE => 'Pirat',
            CharackterRole::BOUNTY_HUNTER => 'Kopfgeldjäger'
        };
    }
}
