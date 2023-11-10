<?php declare(strict_types=1);

namespace Stormannsgal\Core\Factory;

use PDO;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class DatabaseFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): PDO
    {
        $settings = $container->get('config');
        $settings = $settings['database'];

        $dsn = 'mysql:dbname=' . $settings['dbname'] . ';host=' . $settings['host'] . ';port=' . $settings['port'] . ';charset=utf8';
        $user = $settings['user'];
        $password = $settings['password'];
        $options = [
            PDO::ATTR_ERRMODE => $settings['error'],
            PDO::ATTR_EMULATE_PREPARES => $settings['emulate_prepares'],
        ];

        return new PDO($dsn, $user, $password, $options);
    }
}
