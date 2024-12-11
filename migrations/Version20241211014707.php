<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241211014707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session ADD COLUMN date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE session ADD COLUMN is_active BOOLEAN NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__session AS SELECT id, code FROM session');
        $this->addSql('DROP TABLE session');
        $this->addSql('CREATE TABLE session (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, code INTEGER NOT NULL)');
        $this->addSql('INSERT INTO session (id, code) SELECT id, code FROM __temp__session');
        $this->addSql('DROP TABLE __temp__session');
    }
}
