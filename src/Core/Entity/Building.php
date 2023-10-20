<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

use Stormannsgal\Core\Enum\BuildingType;

interface Building
{
    public function getId(): string;

    public function getName(): string;

    public function getType(): BuildingType;
}
