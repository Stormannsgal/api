<?php declare(strict_types=1);

namespace Stormannsgal\App\Entity;

use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;
use Stormannsgal\App\Enum\AccountRole;
use Stormannsgal\Core\Entity\AccountInterface;
use Stormannsgal\Core\Type\Email;
use Stormannsgal\Core\Utils\Collectible;

readonly class Account implements AccountInterface, Collectible
{
    public const AUTHENTICATED = 'authenticated User';

    public function __construct(
        private int $id,
        private UuidInterface $uuid,
        private AccountRole $role,
        private string $password,
        private Email $email,
        private DateTimeImmutable $lastAction,
        private ?string $name = null,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function getRole(): AccountRole
    {
        return $this->role;
    }

    public function getName(): null|string
    {
        return $this->name;
    }

    public function getEmail(): Email
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
