<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227010633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir ADD bateau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contenir ADD CONSTRAINT FK_3C914DFDA9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('CREATE INDEX IDX_3C914DFDA9706509 ON contenir (bateau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir DROP FOREIGN KEY FK_3C914DFDA9706509');
        $this->addSql('DROP INDEX IDX_3C914DFDA9706509 ON contenir');
        $this->addSql('ALTER TABLE contenir DROP bateau_id');
    }
}
