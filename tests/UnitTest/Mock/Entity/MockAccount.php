<?php declare(strict_types=1);

namespace Stormannsgal\Mock\Entity;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Stormannsgal\Core\Entity\AccountInterface;
use Stormannsgal\Core\Type\Email;
use Stormannsgal\Mock\Constants\Account;

class MockAccount implements AccountInterface
{
    public function getId(): int
    {
        // TODO: Implement getId() method.
    }

    public function getUuid(): UuidInterface
    {
        return Uuid::fromString(Account::UUID);
    }

    public function getName(): null|string
    {
        // TODO: Implement getName() method.
    }

    public function getPasswordHash(): string
    {
        // TODO: Implement getPasswordHash() method.
    }

    public function getEMail(): Email
    {
        // TODO: Implement getEMail() method.
    }

    public function getRegisteredAt(): DateTimeImmutable
    {
        // TODO: Implement getRegisteredAt() method.
    }

    public function getLastActionAt(): DateTimeImmutable
    {
        // TODO: Implement getLastActionAt() method.
    }
}
