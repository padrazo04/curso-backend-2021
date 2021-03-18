<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318193256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task_order ADD track_id INT NOT NULL');
        $this->addSql('ALTER TABLE task_order ADD employee_id INT NOT NULL');
        $this->addSql('ALTER TABLE task_order ADD CONSTRAINT FK_328D88B85ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task_order ADD CONSTRAINT FK_328D88B88C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_328D88B85ED23C43 ON task_order (track_id)');
        $this->addSql('CREATE INDEX IDX_328D88B88C03F15C ON task_order (employee_id)');
        $this->addSql('ALTER TABLE ticket ADD track_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA35ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA319EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_97A0ADA35ED23C43 ON ticket (track_id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA319EB6921 ON ticket (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE task_order DROP CONSTRAINT FK_328D88B85ED23C43');
        $this->addSql('ALTER TABLE task_order DROP CONSTRAINT FK_328D88B88C03F15C');
        $this->addSql('DROP INDEX IDX_328D88B85ED23C43');
        $this->addSql('DROP INDEX IDX_328D88B88C03F15C');
        $this->addSql('ALTER TABLE task_order DROP track_id');
        $this->addSql('ALTER TABLE task_order DROP employee_id');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA35ED23C43');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA319EB6921');
        $this->addSql('DROP INDEX IDX_97A0ADA35ED23C43');
        $this->addSql('DROP INDEX IDX_97A0ADA319EB6921');
        $this->addSql('ALTER TABLE ticket DROP track_id');
        $this->addSql('ALTER TABLE ticket DROP client_id');
    }
}
