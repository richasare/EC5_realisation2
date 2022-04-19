<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227002204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE traversee ADD le_bateau_id INT DEFAULT NULL, ADD la_liaison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501706871FE FOREIGN KEY (le_bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F5012ED55551 FOREIGN KEY (la_liaison_id) REFERENCES liaison (id)');
        $this->addSql('CREATE INDEX IDX_B688F501706871FE ON traversee (le_bateau_id)');
        $this->addSql('CREATE INDEX IDX_B688F5012ED55551 ON traversee (la_liaison_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501706871FE');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F5012ED55551');
        $this->addSql('DROP INDEX IDX_B688F501706871FE ON traversee');
        $this->addSql('DROP INDEX IDX_B688F5012ED55551 ON traversee');
        $this->addSql('ALTER TABLE traversee DROP le_bateau_id, DROP la_liaison_id');
    }
}
