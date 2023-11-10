<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

use Stormannsgal\Game\Enum\CharacterPermission;
use Stormannsgal\Game\Enum\CharackterRole;

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
