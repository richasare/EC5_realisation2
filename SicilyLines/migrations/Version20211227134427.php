<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227134427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposer MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE proposer DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE proposer DROP id, CHANGE equipement_id equipement_id INT NOT NULL, CHANGE bateau_id bateau_id INT NOT NULL');
        $this->addSql('ALTER TABLE proposer ADD PRIMARY KEY (equipement_id, bateau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposer ADD id INT AUTO_INCREMENT NOT NULL, CHANGE equipement_id equipement_id INT DEFAULT NULL, CHANGE bateau_id bateau_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
