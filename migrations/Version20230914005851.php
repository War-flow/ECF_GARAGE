<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230914005851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93181A8BA');
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B052E93BA0');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('ALTER TABLE voitures ADD op1 VARCHAR(255) NOT NULL, ADD op2 VARCHAR(255) NOT NULL, ADD op3 VARCHAR(255) NOT NULL, ADD feat1 VARCHAR(255) NOT NULL, ADD feat2 VARCHAR(255) NOT NULL, ADD feat3 VARCHAR(255) NOT NULL, CHANGE year year DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE mile miles INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail (id INT AUTO_INCREMENT NOT NULL, voiture_id INT DEFAULT NULL, texte VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_2E067F93181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, voiture_id_id INT DEFAULT NULL, op VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_5A8600B052E93BA0 (voiture_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93181A8BA FOREIGN KEY (voiture_id) REFERENCES voitures (id)');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B052E93BA0 FOREIGN KEY (voiture_id_id) REFERENCES voitures (id)');
        $this->addSql('ALTER TABLE voitures DROP op1, DROP op2, DROP op3, DROP feat1, DROP feat2, DROP feat3, CHANGE year year DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE miles mile INT NOT NULL');
    }
}
