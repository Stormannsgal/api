<?php declare(strict_types=1);

return [
    'dependencies' => [
        'aliases' => [
            PDO::class => 'database',
            Envms\FluentPDO\Query::class => 'query',
            Ramsey\Uuid\Uuid::class => 'uuid',
            Psr\Log\LoggerInterface::class => 'logger',
        ],
        'invokables' => [
        ],
        'factories' => [
            'database' => Stormannsgal\Core\Factory\DatabaseFactory::class,
            'query' => Stormannsgal\Core\Factory\QueryFactory::class,
            'logger' => Stormannsgal\FunctionalTest\Mock\NullLoggerFactory::class,
        ],
    ],
];
