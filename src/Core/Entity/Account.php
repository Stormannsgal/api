<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

use DateTimeImmutable;
use Stormannsgal\Core\Enum\AccountRole;
use Stormannsgal\Core\Enum\AccountVisibleStatus;

interface Account
{
    public function getId(): string;

    public function getName(): string;

    public function getPasswordHash(): string;

    public function getEMail(): string;

    public function getRole(): AccountRole;

    public function getVisibleStatus(): AccountVisibleStatus;

    public function hasCharacters(): bool;

    public function countCharacters(): int;

    public function getCharacters(): int;

    public function getCreatedAt(): DateTimeImmutable;

    public function isActivated(): bool;

    public function isLocked(): bool;

    public function isDeleted(): bool;
}
