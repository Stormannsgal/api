<?php declare(strict_types=1);

namespace Stormannsgal\App\Hydrator;

use DateTimeImmutable;
use Exception;
use InvalidArgumentException;
use Stormannsgal\App\Entity\Account;
use Stormannsgal\App\Enum\AccountRole;
use Stormannsgal\Core\Entity\Account as AccountInterface;

use function array_diff;
use function array_keys;

class AccountHydrator
{
    private const ACCOUNT_FIELDS
        = [
            'id',
            'uuid',
            'roleId',
            'name',
            'password',
            'email',
            'lastAction',
        ];

    /**
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public function hydrate(array $accountData): AccountInterface
    {
        if (!empty(array_diff(self::ACCOUNT_FIELDS, array_keys($accountData)))) {
            throw new InvalidArgumentException('Transmitted data differs from expected data');
        }

        $accountData['role'] = AccountRole::from($accountData['roleId']);
        unset($accountData['roleId']);
        $accountData['lastAction'] = new DateTimeImmutable($accountData['lastAction']);

        return new Account(...$accountData);
    }
}
