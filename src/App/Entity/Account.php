<?php declare(strict_types=1);

namespace Stormannsgal\App\Entity;

use DateTimeImmutable;
use Stormannsgal\App\Enum\AccountRole;
use Stormannsgal\Core\Entity\Account as AccountInterface;
use Stormannsgal\Core\Utils\Collectible;

readonly class Account implements AccountInterface, Collectible
{
    public const AUTHENTICATED = 'authenticated User';

    public function __construct(
        private int $id,
        private string $uuid,
        private AccountRole $role,
        private string $name,
        private string $password,
        private string $email,
        private DateTimeImmutable $lastAction,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getRole(): AccountRole
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->password;
    }

    public function getLastAction(): DateTimeImmutable
    {
        return $this->lastAction;
    }
}
