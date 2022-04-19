<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227011410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tarifer (id INT AUTO_INCREMENT NOT NULL, la_liaison_id INT DEFAULT NULL, la_periode_id INT DEFAULT NULL, le_type_id INT DEFAULT NULL, tarif NUMERIC(10, 0) NOT NULL, INDEX IDX_6904C4FF2ED55551 (la_liaison_id), INDEX IDX_6904C4FFD382851B (la_periode_id), INDEX IDX_6904C4FFEA83FAE4 (le_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FF2ED55551 FOREIGN KEY (la_liaison_id) REFERENCES liaison (id)');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFD382851B FOREIGN KEY (la_periode_id) REFERENCES periode (id)');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFEA83FAE4 FOREIGN KEY (le_type_id) REFERENCES type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tarifer');
    }
}
