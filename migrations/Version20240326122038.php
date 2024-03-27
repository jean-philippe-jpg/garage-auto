<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240326122038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modeles CHANGE année annee INT NOT NULL');
        $this->addSql('ALTER TABLE services CHANGE id_motorisation_id id_motorisation_id INT NOT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E1694AEB64AD FOREIGN KEY (id_motorisation_id) REFERENCES motorisation (id)');
        $this->addSql('CREATE INDEX IDX_7332E1694AEB64AD ON services (id_motorisation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modeles CHANGE annee année INT NOT NULL');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E1694AEB64AD');
        $this->addSql('DROP INDEX IDX_7332E1694AEB64AD ON services');
        $this->addSql('ALTER TABLE services CHANGE id_motorisation_id id_motorisation_id INT DEFAULT NULL');
    }
}
