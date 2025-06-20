<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250620073037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE cornet (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace ADD cornet_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace ADD CONSTRAINT FK_A6DD185FEFAA6724 FOREIGN KEY (cornet_id) REFERENCES cornet (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A6DD185FEFAA6724 ON glace (cornet_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE glace DROP FOREIGN KEY FK_A6DD185FEFAA6724
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE cornet
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A6DD185FEFAA6724 ON glace
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace DROP cornet_id
        SQL);
    }
}
