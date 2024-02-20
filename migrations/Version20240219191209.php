<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219191209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE services ADD details_services_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169C58F8C3E FOREIGN KEY (details_services_id) REFERENCES details_services (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7332E169C58F8C3E ON services (details_services_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169C58F8C3E');
        $this->addSql('DROP INDEX UNIQ_7332E169C58F8C3E ON services');
        $this->addSql('ALTER TABLE services DROP details_services_id');
    }
}
