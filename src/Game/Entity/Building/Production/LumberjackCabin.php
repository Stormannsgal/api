<?php declare(strict_types=1);

namespace Stormannsgal\Game\Entity\Building\Production;

use Stormannsgal\Core\Entity\Building;
use Stormannsgal\Game\Entity\Building\AbstractBuilding;

class LumberjackCabin extends AbstractBuilding implements Building
{
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }
}
