<?php declare(strict_types=1);

namespace Stormannsgal\Core\Config;

interface Route
{
    public const string PING = 'handler.ping';

    public const string ACCOUNT_CREATE = 'account.create';

    public const string ACCOUNT_LIST_ALL = 'account.list.all';
}
