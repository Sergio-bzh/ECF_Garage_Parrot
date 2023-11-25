<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102222633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, day_of_week VARCHAR(50) NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, schedule_type VARCHAR(50) NOT NULL, INDEX IDX_5A3811FBC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE scheldule DROP FOREIGN KEY FK_DF0F3152C4FFF555');
        $this->addSql('DROP TABLE scheldule');
        $this->addSql('ALTER TABLE vehicle CHANGE desription description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scheldule (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, day_of_week VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, start_time TIME NOT NULL, end_time TIME NOT NULL, schedule_type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_DF0F3152C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE scheldule ADD CONSTRAINT FK_DF0F3152C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FBC4FFF555');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('ALTER TABLE vehicle CHANGE description desription LONGTEXT NOT NULL');
    }
}
