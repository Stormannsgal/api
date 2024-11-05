<?php declare(strict_types=1);

if (getenv('APP_ENV') !== 'action') {
    putenv('APP_ENV=testing');
}
system('php ' . dirname(__FILE__) . '/../../bin/migrations.php migrations:sync-metadata-storage');
system('php ' . dirname(__FILE__) . '/../../bin/migrations.php migrations:migrate --no-interaction');
system('php ' . dirname(__FILE__) . '/../../bin/migrations.php migrations:migrate Migrations\\\Version20231103223745_CreateAccountTable --no-interaction');
system('php ' . dirname(__FILE__) . '/../../bin/migrations.php migrations:migrate --no-interaction');

