<?php declare(strict_types=1);

namespace Stormannsgal\Game\Entity\Building;

use Exception;
use Stormannsgal\Core\Entity\Building as BuildingInterface;
use Stormannsgal\Core\Enum\BuildingType;

abstract class AbstractBuilding implements BuildingInterface
{
    readonly private string $id;
    readonly private string $name;
    readonly private BuildingType $type;

    /**
     * @throws Exception
     */
    public function __construct(array $data = [])
    {
        $properties = [
            'id' => 1,
            'name' => 2,
            'type' => 3,
        ];

        $intersect = array_intersect($properties, $data);

        if (count($properties) !== count($intersect)) {
            throw new Exception('Missed Array Key');
        }
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->type = BuildingType::from($data['type']);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): BuildingType
    {
        return $this->type;
    }
}
