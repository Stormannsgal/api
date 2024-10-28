<?php declare(strict_types=1);

namespace Stormannsgal\Core\Enum\Game;

enum BuildingType: int
{
    case UNDEFINED = 0;
    case PRODUCTION = 1;
    case RESIDENTIAL = 2;
    case WAREHOUSE = 3;
    case MILITARY = 4;
    case RESEARCH = 5;

    public function getBuildingTypeName(): string
    {
        return match ($this) {
            BuildingType::UNDEFINED => 'Undefiniert',
            BuildingType::PRODUCTION => 'Produktionsgebäude',
            BuildingType::RESIDENTIAL => 'Wohngebäude',
            BuildingType::WAREHOUSE => 'Lagerhaus',
            BuildingType::MILITARY => 'Militärgebäude',
            BuildingType::RESEARCH => 'Forschungseinrichtung'
        };
    }
}
