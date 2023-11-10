<?php declare(strict_types=1);

namespace Stormannsgal\App\Factory\Table;

use Envms\FluentPDO\Query;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stormannsgal\App\Table\AccountTable;

class AccountTableFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): AccountTable
    {
        return new AccountTable($container->get(Query::class));
    }
}
