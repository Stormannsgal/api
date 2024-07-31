<?php declare(strict_types=1);

namespace Stormannsgal\App\Entity;

use Stormannsgal\Core\Entity\AccountCollectionInterface;
use Stormannsgal\Core\Entity\AccountInterface;
use Stormannsgal\Core\Exception\InvalidParameterException;
use Stormannsgal\Core\Utils\Collection;

use function get_class;
use function sprintf;

class AccountCollection extends Collection implements AccountCollectionInterface
{
    /**
     * @throws InvalidParameterException
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!($value instanceof AccountInterface)) {
            throw new InvalidParameterException(
                sprintf(
                    '%s must be an instance of %s',
                    get_class($value),
                    AccountInterface::class
                )
            );
        }
        parent::offsetSet($offset, $value);
    }
}
