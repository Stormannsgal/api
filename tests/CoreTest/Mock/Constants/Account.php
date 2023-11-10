<?php declare(strict_types=1);

namespace Stormannsgal\CoreTest\Mock\Constants;

class Account
{
    public const ID = 1;

    public const ID_INVALID = 2;

    public const UUID = '018b9740db6c7126b19c3ab9de2c001c';

    public const UUID_INVALID = '018b97468d1a73eca5177f94dda637d3';

    public const ROLE_ID = 1;

    public const ROLE_ID_INVALID = -1;

    public const NAME = 'Account Name';

    public const NAME_INVALID = 'invalid Account Name';

    public const PASSWORD = 'valid Password';

    public const PASSWORD_INVALID = 'invalid Password';

    public const EMAIL = 'valid@example.com';

    public const EMAIL_INVALID = 'invalid@example.com';

    public const LAST_ACTION = '9999-12-31 23:59:59.999999';

    public const VALID_DATA = [
        'id' => self::ID,
        'uuid' => self::UUID,
        'roleId' => self::ROLE_ID,
        'name' => self::NAME,
        'password' => self::PASSWORD,
        'email' => self::EMAIL,
        'lastAction' => self::LAST_ACTION,
    ];
}
