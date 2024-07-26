<?php declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

final class Version20231103223745_CreateAccountTable extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $table = $schema->createTable('Account');

        $table->addColumn('id', Types::INTEGER, ['autoincrement' => true, 'unsigned' => true,]);
        $table->addColumn('uuid', Types::STRING, ['length' => 32]);
        $table->addColumn('roleId', Types::INTEGER, ['unsigned' => true]);
        $table->addColumn('name', Types::STRING, ['length' => 64, 'notnull' => false]);
        $table->addColumn('password', Types::STRING, ['length' => 64]);
        $table->addColumn('email', Types::STRING, ['length' => 512]);
        $table->addColumn('registrationAt', Types::DATETIME_IMMUTABLE, ['default' => 'CURRENT_TIMESTAMP', 'notnull' => false,]);
        $table->addColumn('lastActionAt', Types::DATETIME_IMMUTABLE, ['default' => 'CURRENT_TIMESTAMP', 'notnull' => false,]);

        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['uuid'], 'account_uuid_UNIQUE');
        $table->addUniqueIndex(['name'], 'account_name_UNIQUE');
        $table->addUniqueIndex(['email'], 'account_email_UNIQUE');
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('Account');
    }
}
