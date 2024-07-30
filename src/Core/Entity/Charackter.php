<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

use Stormannsgal\Core\Enum\Game\CharackterRole;
use Stormannsgal\Core\Enum\Game\CharacterPermission;

interface Charackter
{
    public function getId(): string;

    public function getName(): string;

    public function getRole(): CharackterRole;

    public function getPermission(): CharacterPermission;

    public function getMoney(): Capital;

    public function isLocked(): bool;

    public function isDeleted(): bool;
}
