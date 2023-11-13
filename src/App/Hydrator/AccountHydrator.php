<?php declare(strict_types=1);

namespace Stormannsgal\App\Hydrator;

use DateTimeImmutable;
use Exception;
use InvalidArgumentException;
use Stormannsgal\App\Entity\Account;
use Stormannsgal\App\Enum\AccountRole;
use Stormannsgal\Core\Entity\Account as AccountInterface;
use Stormannsgal\Core\Hydrator\Hydrator;

class AccountHydrator extends Hydrator
{
    /**
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public function hydrate(array $data): AccountInterface
    {
        $data['role'] = AccountRole::from($data['roleId']);
        unset($data['roleId']);
        $data['lastAction'] = new DateTimeImmutable($data['lastAction']);

        return new Account(...$data);
    }
}
