<?php declare(strict_types=1);

namespace Stormannsgal\Core\Enum;

enum AccountRole: int
{
    case OWNER = 1;
    case ADMINISTRATOR = 2;
    case MODERATOR = 3;
    case USER = 4;

    public function getRoleName(): string
    {
        return match ($this) {
            AccountRole::OWNER => 'Eigentümer',
            AccountRole::ADMINISTRATOR => 'Administrator',
            AccountRole::MODERATOR => 'Moderator',
            AccountRole::USER => 'Spieler'
        };
    }
}
