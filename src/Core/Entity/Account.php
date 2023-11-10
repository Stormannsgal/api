<?php declare(strict_types=1);

namespace Stormannsgal\Core\Entity;

use DateTimeImmutable;
use Stormannsgal\App\Enum\AccountRole;
use Stormannsgal\App\Enum\AccountVisibleStatus;

interface Account
{
    public function getId(): int;

    public function getUuid(): string;

    public function getName(): string;

    public function getPasswordHash(): string;

    public function getEMail(): string;

    public function getRole(): AccountRole;

    public function getLastAction(): DateTimeImmutable;
}
