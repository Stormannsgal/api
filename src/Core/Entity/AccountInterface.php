<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;
use Stormannsgal\App\Enum\AccountRole;
use Stormannsgal\Core\Type\Email;

interface AccountInterface
{
    public function getId(): int;

    public function getUuid(): UuidInterface;

    public function getName(): null|string;

    public function getPasswordHash(): string;

    public function getEMail(): Email;

    public function getRole(): AccountRole;

    public function getRegisteredAt(): DateTimeImmutable;

    public function getLastActionAt(): DateTimeImmutable;
}
