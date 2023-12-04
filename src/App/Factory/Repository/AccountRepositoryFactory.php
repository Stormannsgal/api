<?php declare(strict_types=1);

namespace Stormannsgal\App\Factory\Repository;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stormannsgal\App\Hydrator\AccountHydrator;
use Stormannsgal\App\Repository\AccountRepository;
use Stormannsgal\App\Table\AccountTable;

class AccountRepositoryFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): AccountRepository
    {
        return new AccountRepository(
            $container->get(AccountTable::class),
            $container->get(AccountHydrator::class),
        );
    }
}
