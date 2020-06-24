<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200624153045 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medication (id INT AUTO_INCREMENT NOT NULL, pres_medic_id INT DEFAULT NULL, pharm_medic_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, number INT NOT NULL, INDEX IDX_5AEE5B70C95365BC (pres_medic_id), INDEX IDX_5AEE5B70D6DBC314 (pharm_medic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharm_medic (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharmacy (id INT AUTO_INCREMENT NOT NULL, pharm_medic_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, phone INT DEFAULT NULL, horaire VARCHAR(255) DEFAULT NULL, INDEX IDX_D6C15C1ED6DBC314 (pharm_medic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pres_medic (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prescription (id INT AUTO_INCREMENT NOT NULL, pres_medic_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, qrcode VARCHAR(255) DEFAULT NULL, is_archived TINYINT(1) NOT NULL, INDEX IDX_1FBFB8D9C95365BC (pres_medic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medication ADD CONSTRAINT FK_5AEE5B70C95365BC FOREIGN KEY (pres_medic_id) REFERENCES pres_medic (id)');
        $this->addSql('ALTER TABLE medication ADD CONSTRAINT FK_5AEE5B70D6DBC314 FOREIGN KEY (pharm_medic_id) REFERENCES pharm_medic (id)');
        $this->addSql('ALTER TABLE pharmacy ADD CONSTRAINT FK_D6C15C1ED6DBC314 FOREIGN KEY (pharm_medic_id) REFERENCES pharm_medic (id)');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9C95365BC FOREIGN KEY (pres_medic_id) REFERENCES pres_medic (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medication DROP FOREIGN KEY FK_5AEE5B70D6DBC314');
        $this->addSql('ALTER TABLE pharmacy DROP FOREIGN KEY FK_D6C15C1ED6DBC314');
        $this->addSql('ALTER TABLE medication DROP FOREIGN KEY FK_5AEE5B70C95365BC');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9C95365BC');
        $this->addSql('DROP TABLE medication');
        $this->addSql('DROP TABLE pharm_medic');
        $this->addSql('DROP TABLE pharmacy');
        $this->addSql('DROP TABLE pres_medic');
        $this->addSql('DROP TABLE prescription');
        $this->addSql('DROP TABLE user');
    }
}
