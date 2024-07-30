<?php declare(strict_types=1);

namespace Stormannsgal\Core\Enum\App;

enum AccountRole: int
{
    case OWNER = 1;
    case ADMINISTRATOR = 2;
    case GAME_MASTER = 3;
    case MODERATOR = 4;
    case USER = 5;

    public function getRoleName(): string
    {
        return match ($this) {
            AccountRole::OWNER => 'Eigentümer',
            AccountRole::ADMINISTRATOR => 'Administrator',
            AccountRole::GAME_MASTER => 'Spielleiter',
            AccountRole::MODERATOR => 'Moderator',
            AccountRole::USER => 'Spieler'
        };
    }
}
