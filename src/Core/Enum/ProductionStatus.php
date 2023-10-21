<?php declare(strict_types=1);

namespace Stormannsgal\Core\Enum;

enum ProductionStatus: int
{
    case IDLE = 1;
    case WAITING = 2;
    case IN_PROGRESS = 3;
    case FINISHED = 4;

    public function getProductionStatusAsText(): string
    {
        return match ($this) {
            ProductionStatus::IDLE => 'Untätig',
            ProductionStatus::WAITING => 'Warten',
            ProductionStatus::IN_PROGRESS => 'in Arbeit',
            ProductionStatus::FINISHED => 'Abgeschlossen'
        };
    }
}
