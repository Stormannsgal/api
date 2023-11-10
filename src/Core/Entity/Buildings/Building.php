<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity\Buildings;

use Stormannsgal\Game\Enum\BuildingType;

interface Building
{
    public function getId(): string;

    public function getName(): string;

    public function getType(): BuildingType;

    public function getLevel(): int;
}
