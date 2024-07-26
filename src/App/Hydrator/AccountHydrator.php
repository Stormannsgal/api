<?php declare(strict_types=1);

namespace Stormannsgal\App\Hydrator;

use DateTimeImmutable;
use Exception;
use Ramsey\Uuid\Uuid;
use Stormannsgal\App\Entity\Account;
use Stormannsgal\App\Enum\AccountRole;
use Stormannsgal\Core\Entity\AccountInterface;
use Stormannsgal\Core\Hydrator\Hydrator;
use Stormannsgal\Core\Type\Email;

class AccountHydrator extends Hydrator
{
    /**
     * @throws Exception
     */
    public function hydrate(array $data): AccountInterface
    {
        return new Account(
            id: $data['id'],
            uuid: Uuid::fromString($data['uuid']),
            role: AccountRole::from($data['roleId']),
            name: $data['name'],
            password: $data['password'],
            email: new Email($data['email']),
            registeredAt: new DateTimeImmutable($data['registeredAt']),
            lastActionAt: new DateTimeImmutable($data['lastActionAt']),
        );
    }
}
