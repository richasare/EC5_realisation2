<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227010518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir ADD la_categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contenir ADD CONSTRAINT FK_3C914DFD281042B9 FOREIGN KEY (la_categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_3C914DFD281042B9 ON contenir (la_categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir DROP FOREIGN KEY FK_3C914DFD281042B9');
        $this->addSql('DROP INDEX IDX_3C914DFD281042B9 ON contenir');
        $this->addSql('ALTER TABLE contenir DROP la_categorie_id');
    }
}
