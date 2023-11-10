<?php declare(strict_types=1);

namespace Stormannsgal\App\Entity;

use InvalidArgumentException;
use Stormannsgal\Core\Entity\Account as AccountInterface;
use Stormannsgal\Core\Entity\AccountCollection as AccountCollectionInterface;
use Stormannsgal\Core\Utils\Collection;

use function sprintf;

class AccountCollection extends Collection implements AccountCollectionInterface
{
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!($value instanceof AccountInterface)) {
            throw new InvalidArgumentException(
                sprintf('%d must instanceof AccountInterface', $value)
            );
        }
        parent::offsetSet($offset, $value);
    }
}
