<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227133624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE contenir DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE contenir DROP id, CHANGE la_categorie_id la_categorie_id INT NOT NULL, CHANGE bateau_id bateau_id INT NOT NULL');
        $this->addSql('ALTER TABLE contenir ADD PRIMARY KEY (la_categorie_id, bateau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir ADD id INT AUTO_INCREMENT NOT NULL, CHANGE la_categorie_id la_categorie_id INT DEFAULT NULL, CHANGE bateau_id bateau_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
