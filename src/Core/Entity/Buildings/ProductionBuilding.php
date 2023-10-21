<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity\Buildings;

use Stormannsgal\Core\Entity\Material;

interface ProductionBuilding extends Building
{
    public function getProductionSpeed(): int;

    public function getProducedProduct(): Material;
}
