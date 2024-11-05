<?php declare(strict_types=1);

namespace Stormannsgal\App\Entity;

use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;
use Stormannsgal\Core\Entity\AccountInterface;
use Stormannsgal\Core\Trait\CloneReadonlyClassWith;
use Stormannsgal\Core\Type\Email;
use Stormannsgal\Core\Utils\Collectible;

readonly class Account implements AccountInterface, Collectible
{
    use CloneReadonlyClassWith;

    public function __construct(
        private ?int $id,
        private UuidInterface $uuid,
        private ?string $name,
        private string $password,
        private Email $email,
        private DateTimeImmutable $registeredAt,
        private DateTimeImmutable $lastActionAt,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
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

    public function getRegisteredAt(): DateTimeImmutable
    {
        return $this->registeredAt;
    }

    public function getLastActionAt(): DateTimeImmutable
    {
        return $this->lastActionAt;
    }
}
