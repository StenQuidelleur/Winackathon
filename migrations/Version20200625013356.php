<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625013356 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prescription ADD user_id INT NOT NULL, ADD firstname VARCHAR(80) NOT NULL, ADD lastname VARCHAR(80) NOT NULL, ADD security_social_number INT NOT NULL');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1FBFB8D9A76ED395 ON prescription (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64993DB413D');
        $this->addSql('DROP INDEX IDX_8D93D64993DB413D ON user');
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(80) NOT NULL, ADD lastname VARCHAR(80) NOT NULL, DROP prescription_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9A76ED395');
        $this->addSql('DROP INDEX IDX_1FBFB8D9A76ED395 ON prescription');
        $this->addSql('ALTER TABLE prescription DROP user_id, DROP firstname, DROP lastname, DROP security_social_number');
        $this->addSql('ALTER TABLE user ADD prescription_id INT DEFAULT NULL, DROP firstname, DROP lastname');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64993DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64993DB413D ON user (prescription_id)');
    }
}
