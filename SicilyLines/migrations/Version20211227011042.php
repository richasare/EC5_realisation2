<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227011042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participer ADD le_type_id INT DEFAULT NULL, ADD la_reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participer ADD CONSTRAINT FK_EDBE16F8EA83FAE4 FOREIGN KEY (le_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE participer ADD CONSTRAINT FK_EDBE16F8BA31B7B FOREIGN KEY (la_reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_EDBE16F8EA83FAE4 ON participer (le_type_id)');
        $this->addSql('CREATE INDEX IDX_EDBE16F8BA31B7B ON participer (la_reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participer DROP FOREIGN KEY FK_EDBE16F8EA83FAE4');
        $this->addSql('ALTER TABLE participer DROP FOREIGN KEY FK_EDBE16F8BA31B7B');
        $this->addSql('DROP INDEX IDX_EDBE16F8EA83FAE4 ON participer');
        $this->addSql('DROP INDEX IDX_EDBE16F8BA31B7B ON participer');
        $this->addSql('ALTER TABLE participer DROP le_type_id, DROP la_reservation_id');
    }
}
