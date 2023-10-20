<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

use Stormannsgal\Core\Enum\CharackterPermission;
use Stormannsgal\Core\Enum\CharackterRole;

interface Charackter
{
    public function getId(): string;

    public function getName(): string;

    public function getRole(): CharackterRole;

    public function getPermission(): CharackterPermission;

    public function getMoney(): Money;

    public function isLocked(): bool;

    public function isDeleted(): bool;
}
