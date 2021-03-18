<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318191254 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE track_trail (track_id INT NOT NULL, trail_id INT NOT NULL, PRIMARY KEY(track_id, trail_id))');
        $this->addSql('CREATE INDEX IDX_C29F27285ED23C43 ON track_trail (track_id)');
        $this->addSql('CREATE INDEX IDX_C29F272889B51C5B ON track_trail (trail_id)');
        $this->addSql('ALTER TABLE track_trail ADD CONSTRAINT FK_C29F27285ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE track_trail ADD CONSTRAINT FK_C29F272889B51C5B FOREIGN KEY (trail_id) REFERENCES trail (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trail ADD park_id INT NOT NULL');
        $this->addSql('ALTER TABLE trail ADD CONSTRAINT FK_B268858F44990C25 FOREIGN KEY (park_id) REFERENCES park (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B268858F44990C25 ON trail (park_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE track_trail');
        $this->addSql('ALTER TABLE trail DROP CONSTRAINT FK_B268858F44990C25');
        $this->addSql('DROP INDEX IDX_B268858F44990C25');
        $this->addSql('ALTER TABLE trail DROP park_id');
    }
}
