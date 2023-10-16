<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231016142848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, brand_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, garage_name VARCHAR(50) NOT NULL, street_number INT NOT NULL, street VARCHAR(50) NOT NULL, zip_code INT NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL, phone_number VARCHAR(13) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, model_name VARCHAR(50) NOT NULL, release_date DATE NOT NULL, energy_type VARCHAR(50) NOT NULL, motorization VARCHAR(50) NOT NULL, horse_power INT NOT NULL, INDEX IDX_D79572D944F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, option_name VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scheldule (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, day_of_week VARCHAR(50) NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, schedule_type VARCHAR(50) NOT NULL, INDEX IDX_DF0F3152C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, garage_id INT DEFAULT NULL, model_id INT NOT NULL, kilometers INT NOT NULL, price NUMERIC(10, 2) NOT NULL, desription LONGTEXT NOT NULL, registration_date DATE NOT NULL, INDEX IDX_1B80E486C4FFF555 (garage_id), INDEX IDX_1B80E4867975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE scheldule ADD CONSTRAINT FK_DF0F3152C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4867975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE scheldule DROP FOREIGN KEY FK_DF0F3152C4FFF555');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486C4FFF555');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4867975B7E7');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE scheldule');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE vehicle');
    }
}
