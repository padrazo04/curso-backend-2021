<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318185623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE employee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE park_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE task_order_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ticket_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE track_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE trail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE employee (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, dob DATE NOT NULL, nic VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, address VARCHAR(2048) NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5D9F75A1E7927C74 ON employee (email)');
        $this->addSql('CREATE TABLE park (id INT NOT NULL, name VARCHAR(255) NOT NULL, schedule TEXT NOT NULL, city VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE task_order (id INT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ticket (id INT NOT NULL, sold_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE track (id INT NOT NULL, starts_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, duration_in_minutes INT NOT NULL, is_private BOOLEAN NOT NULL, length_in_meters INT NOT NULL, seats INT NOT NULL, modality VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE trail (id INT NOT NULL, name VARCHAR(255) NOT NULL, is_open BOOLEAN NOT NULL, difficulty VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE client ADD name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD surname VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD nic VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD phone_number VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE employee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE park_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE task_order_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ticket_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE track_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE trail_id_seq CASCADE');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE park');
        $this->addSql('DROP TABLE task_order');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE track');
        $this->addSql('DROP TABLE trail');
        $this->addSql('ALTER TABLE client DROP name');
        $this->addSql('ALTER TABLE client DROP surname');
        $this->addSql('ALTER TABLE client DROP nic');
        $this->addSql('ALTER TABLE client DROP phone_number');
    }
}
