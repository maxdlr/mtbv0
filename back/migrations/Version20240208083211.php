<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208083211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prompt_list (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prompt ADD prompt_list_id INT NOT NULL');
        $this->addSql('ALTER TABLE prompt ADD CONSTRAINT FK_62EF6C38573814D5 FOREIGN KEY (prompt_list_id) REFERENCES prompt_list (id)');
        $this->addSql('CREATE INDEX IDX_62EF6C38573814D5 ON prompt (prompt_list_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE prompt_list');
        $this->addSql('ALTER TABLE prompt DROP FOREIGN KEY FK_62EF6C38573814D5');
        $this->addSql('DROP INDEX IDX_62EF6C38573814D5 ON prompt');
        $this->addSql('ALTER TABLE prompt DROP prompt_list_id');
    }
}
