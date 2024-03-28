<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328210907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE details_services ADD id_service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE details_services ADD CONSTRAINT FK_196492E248D62931 FOREIGN KEY (id_service_id) REFERENCES services (id)');
        $this->addSql('CREATE INDEX IDX_196492E248D62931 ON details_services (id_service_id)');
        $this->addSql('ALTER TABLE motorisation CHANGE id_modele_id id_modele_id INT NOT NULL');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169C58F8C3E');
        $this->addSql('DROP INDEX UNIQ_7332E169C58F8C3E ON services');
        $this->addSql('ALTER TABLE services DROP details_services_id, CHANGE id_motorisation_id id_motorisation_id INT NOT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E1694AEB64AD FOREIGN KEY (id_motorisation_id) REFERENCES motorisation (id)');
        $this->addSql('CREATE INDEX IDX_7332E1694AEB64AD ON services (id_motorisation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE details_services DROP FOREIGN KEY FK_196492E248D62931');
        $this->addSql('DROP INDEX IDX_196492E248D62931 ON details_services');
        $this->addSql('ALTER TABLE details_services DROP id_service_id');
        $this->addSql('ALTER TABLE motorisation CHANGE id_modele_id id_modele_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E1694AEB64AD');
        $this->addSql('DROP INDEX IDX_7332E1694AEB64AD ON services');
        $this->addSql('ALTER TABLE services ADD details_services_id INT DEFAULT NULL, CHANGE id_motorisation_id id_motorisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169C58F8C3E FOREIGN KEY (details_services_id) REFERENCES details_services (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7332E169C58F8C3E ON services (details_services_id)');
    }
}
