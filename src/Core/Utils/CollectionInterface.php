<?php declare(strict_types=1);

namespace Stormannsgal\Core\Utils;

use ArrayAccess;
use Countable;
use Iterator;
use JsonSerializable;

interface CollectionInterface extends Countable, ArrayAccess, Iterator, JsonSerializable
{
}
