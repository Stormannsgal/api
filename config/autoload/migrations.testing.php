<?php declare(strict_types=1);

return [
    'migrations' => [
        'table_storage' => [
            'table_name' => 'MigrationVersions',
            'version_column_name' => 'version',
            'version_column_length' => 192,
            'executed_at_column_name' => 'executedAt',
            'execution_time_column_name' => 'executionTime',
        ],

        'migrations_paths' => [
            'Migrations' => __DIR__ . '/../../database/migrations',
            'TestDataMigrations' => __DIR__ . '/../../tests/FunctionalTest/database/migrations',
        ],

        'all_or_nothing' => true,
        'transactional' => true,
        'check_database_platform' => true,
        'organize_migrations' => 'none',
    ],
];
