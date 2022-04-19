<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227002502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison ADD le_secteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC37BC7E3BAE FOREIGN KEY (le_secteur_id) REFERENCES secteur (id)');
        $this->addSql('CREATE INDEX IDX_225AC37BC7E3BAE ON liaison (le_secteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC37BC7E3BAE');
        $this->addSql('DROP INDEX IDX_225AC37BC7E3BAE ON liaison');
        $this->addSql('ALTER TABLE liaison DROP le_secteur_id');
    }
}
