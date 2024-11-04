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
                (1, '0192f76a139d7eb382df26219fb0fa2e', 'Owner', '$2y$10$7CTXgZwEToSkEkMZa2zyPe8hrYA1wZPk5.ntQW6HN.p69/WjhzNW2', 'owner@example.com'),
                (2, '0192f76b0b4e7a4bb4d872eb2f491066', 'Administrator', '$2y$10$3Jq/noG9uLCir1BkgQV85Ono1XuuwpFlAcvI2dqtxVao/En33nIWC', 'admin@example.com'),
                (3, '0192f76d06747f13b77d36d958ffd32d', 'Moderator', '$2y$10$79SWSxmeKTswZS2xvkJ/reQ10QWfyYAvSb/J9L0S4XxAmYUhlVIo2', 'moderator@example.com'),
                (4, '0192f770b91d7b57893d170d52ebfdd1', 'User', '$2y$10$3o4s66Syqq8d0ZWDvFoRue7AZ9mHBJZ/Hn.vOdTEFXG6Tcbd3090m', 'user@example.com'),
                (5, '0192cfe9233172cd972f837375c8f53e', 'Account Name', '$2y$10$5gfDHJyA1bxRc3AQJDBGduAYQPvEliOVg4bC7E3ua3/ed9P.wGDCm', 'valid@example.com');
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
