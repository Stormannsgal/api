<?php declare(strict_types=1);

namespace Stormannsgal\Core\Enum;

enum CharackterPermission: int
{
    case OWNER = 1;
    case GAME_MASTER = 2;
    case HELPER = 3;
    case PLAYER = 4;

    public function getPermissionName(): string
    {
        return match ($this) {
            CharackterPermission::OWNER => 'Gott',
            CharackterPermission::GAME_MASTER => 'Spielleiter',
            CharackterPermission::HELPER => 'Helfende Hand',
            CharackterPermission::PLAYER => 'Spieler'
        };
    }
}
