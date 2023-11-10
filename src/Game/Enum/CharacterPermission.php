<?php declare(strict_types=1);

namespace Stormannsgal\Game\Enum;

enum CharacterPermission: int
{
    case OWNER = 1;
    case GAME_MASTER = 2;
    case HELPER = 3;
    case PLAYER = 4;

    public function getPermissionName(): string
    {
        return match ($this) {
            CharacterPermission::OWNER => 'Gott',
            CharacterPermission::GAME_MASTER => 'Spielleiter',
            CharacterPermission::HELPER => 'Helfende Hand',
            CharacterPermission::PLAYER => 'Spieler'
        };
    }
}
