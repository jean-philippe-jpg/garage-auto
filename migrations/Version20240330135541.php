<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240330135541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vmarques (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vmodeles (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voitures ADD id_marque_id INT DEFAULT NULL, ADD id_modele_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301BC8120595 FOREIGN KEY (id_marque_id) REFERENCES vmarques (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301B2C210B2D FOREIGN KEY (id_modele_id) REFERENCES vmodeles (id)');
        $this->addSql('CREATE INDEX IDX_8B58301BC8120595 ON voitures (id_marque_id)');
        $this->addSql('CREATE INDEX IDX_8B58301B2C210B2D ON voitures (id_modele_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301BC8120595');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301B2C210B2D');
        $this->addSql('DROP TABLE vmarques');
        $this->addSql('DROP TABLE vmodeles');
        $this->addSql('DROP INDEX IDX_8B58301BC8120595 ON voitures');
        $this->addSql('DROP INDEX IDX_8B58301B2C210B2D ON voitures');
        $this->addSql('ALTER TABLE voitures DROP id_marque_id, DROP id_modele_id');
    }
}
