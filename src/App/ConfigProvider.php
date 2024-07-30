<?php declare(strict_types=1);

namespace Stormannsgal\App;

use Stormannsgal\App\Handler\Account\ListAllAccountsHandler;
use Stormannsgal\App\Handler\PingHandler;
use Stormannsgal\App\Hydrator\AccountHydrator;
use Stormannsgal\App\Repository\AccountRepository;
use Stormannsgal\App\Repository\AccountRepositoryFactory;
use Stormannsgal\App\Table\AccountTable;
use Stormannsgal\App\Table\AccountTableFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'invokables' => [
                ListAllAccountsHandler::class => ListAllAccountsHandler::class,
                PingHandler::class => PingHandler::class,

                AccountHydrator::class => AccountHydrator::class,
            ],
            'factories' => [
                AccountRepository::class => AccountRepositoryFactory::class,

                AccountTable::class => AccountTableFactory::class,
            ],
        ];
    }
}
