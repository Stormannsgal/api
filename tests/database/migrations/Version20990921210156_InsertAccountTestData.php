<?php declare(strict_types=1);

namespace TestDataMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20990921210156_InsertAccountTestData extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $sql = <<<SQL
              INSERT INTO `Account` (`id`, `uuid`, `name`, `password`, `email`) VALUES
                (2, '0192cfe9233172cd972f837375c8f53e', 'Account Name', '$2y$10$5gfDHJyA1bxRc3AQJDBGduAYQPvEliOVg4bC7E3ua3/ed9P.wGDCm', 'valid@example.com');
        SQL;

        $this->addSql($sql);
    }

    public function down(Schema $schema): void
    {
        $sql = <<<SQL
              DELETE FROM `Account`; 
        SQL;

        $this->addSql($sql);
    }
}
