<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227134312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participer MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE participer DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE participer DROP id, CHANGE le_type_id le_type_id INT NOT NULL, CHANGE la_reservation_id la_reservation_id INT NOT NULL');
        $this->addSql('ALTER TABLE participer ADD PRIMARY KEY (le_type_id, la_reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participer ADD id INT AUTO_INCREMENT NOT NULL, CHANGE le_type_id le_type_id INT DEFAULT NULL, CHANGE la_reservation_id la_reservation_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
