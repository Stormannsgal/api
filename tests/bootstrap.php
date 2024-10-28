<?php declare(strict_types=1);

putenv('APP_ENV=testing');
system('php ' . dirname(__FILE__) . '/../bin/migrations.php migrations:sync-metadata-storage');
system('php ' . dirname(__FILE__) . '/../bin/migrations.php migrations:migrate --no-interaction');
system('php ' . dirname(__FILE__) . '/../bin/migrations.php migrations:migrate Migrations\\\Version20231103224045_CreateAccountAccessAuthTable --no-interaction');
system('php ' . dirname(__FILE__) . '/../bin/migrations.php migrations:migrate --no-interaction');

