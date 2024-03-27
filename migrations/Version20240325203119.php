<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240325203119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE motorisation ADD id_modele_id INT NOT NULL');
        $this->addSql('ALTER TABLE motorisation ADD CONSTRAINT FK_40F7E0FA2C210B2D FOREIGN KEY (id_modele_id) REFERENCES modeles (id)');
        $this->addSql('CREATE INDEX IDX_40F7E0FA2C210B2D ON motorisation (id_modele_id)');
        $this->addSql('ALTER TABLE services ADD id_motorisation_id INT NOT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E1694AEB64AD FOREIGN KEY (id_motorisation_id) REFERENCES motorisation (id)');
        $this->addSql('CREATE INDEX IDX_7332E1694AEB64AD ON services (id_motorisation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE motorisation DROP FOREIGN KEY FK_40F7E0FA2C210B2D');
        $this->addSql('DROP INDEX IDX_40F7E0FA2C210B2D ON motorisation');
        $this->addSql('ALTER TABLE motorisation DROP id_modele_id');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E1694AEB64AD');
        $this->addSql('DROP INDEX IDX_7332E1694AEB64AD ON services');
        $this->addSql('ALTER TABLE services DROP id_motorisation_id');
    }
}
