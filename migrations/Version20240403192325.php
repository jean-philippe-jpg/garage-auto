<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240403192325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vmodeles ADD marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vmodeles ADD CONSTRAINT FK_ECDF8C484827B9B2 FOREIGN KEY (marque_id) REFERENCES vmarques (id)');
        $this->addSql('CREATE INDEX IDX_ECDF8C484827B9B2 ON vmodeles (marque_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vmodeles DROP FOREIGN KEY FK_ECDF8C484827B9B2');
        $this->addSql('DROP INDEX IDX_ECDF8C484827B9B2 ON vmodeles');
        $this->addSql('ALTER TABLE vmodeles DROP marque_id');
    }
}
