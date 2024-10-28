<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

use Stormannsgal\Core\Enum\Game\LocationType;

interface Location
{
    public function getId(): string;

    public function getName(): string;

    public function getType(): LocationType;
}
