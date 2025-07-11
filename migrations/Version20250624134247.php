<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250624134247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE glace_topping (glace_id INT NOT NULL, topping_id INT NOT NULL, INDEX IDX_7C12239E7BD89A2B (glace_id), INDEX IDX_7C12239EE9C2067C (topping_id), PRIMARY KEY(glace_id, topping_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE topping (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace_topping ADD CONSTRAINT FK_7C12239E7BD89A2B FOREIGN KEY (glace_id) REFERENCES glace (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace_topping ADD CONSTRAINT FK_7C12239EE9C2067C FOREIGN KEY (topping_id) REFERENCES topping (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace DROP image_file
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE glace_topping DROP FOREIGN KEY FK_7C12239E7BD89A2B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace_topping DROP FOREIGN KEY FK_7C12239EE9C2067C
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE glace_topping
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE topping
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace ADD image_file VARCHAR(255) NOT NULL
        SQL);
    }
}
