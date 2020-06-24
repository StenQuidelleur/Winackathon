<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200624155441 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medication DROP FOREIGN KEY FK_5AEE5B70C95365BC');
        $this->addSql('ALTER TABLE medication DROP FOREIGN KEY FK_5AEE5B70D6DBC314');
        $this->addSql('DROP INDEX IDX_5AEE5B70D6DBC314 ON medication');
        $this->addSql('DROP INDEX IDX_5AEE5B70C95365BC ON medication');
        $this->addSql('ALTER TABLE medication DROP pres_medic_id, DROP pharm_medic_id');
        $this->addSql('ALTER TABLE pharm_medic ADD pharmacy_id INT DEFAULT NULL, ADD medication_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pharm_medic ADD CONSTRAINT FK_A74104AB8A94ABE2 FOREIGN KEY (pharmacy_id) REFERENCES pharmacy (id)');
        $this->addSql('ALTER TABLE pharm_medic ADD CONSTRAINT FK_A74104AB2C4DE6DA FOREIGN KEY (medication_id) REFERENCES medication (id)');
        $this->addSql('CREATE INDEX IDX_A74104AB8A94ABE2 ON pharm_medic (pharmacy_id)');
        $this->addSql('CREATE INDEX IDX_A74104AB2C4DE6DA ON pharm_medic (medication_id)');
        $this->addSql('ALTER TABLE pharmacy DROP FOREIGN KEY FK_D6C15C1ED6DBC314');
        $this->addSql('DROP INDEX IDX_D6C15C1ED6DBC314 ON pharmacy');
        $this->addSql('ALTER TABLE pharmacy DROP pharm_medic_id');
        $this->addSql('ALTER TABLE pres_medic ADD medication_id INT DEFAULT NULL, ADD prescription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pres_medic ADD CONSTRAINT FK_31C5EFCB2C4DE6DA FOREIGN KEY (medication_id) REFERENCES medication (id)');
        $this->addSql('ALTER TABLE pres_medic ADD CONSTRAINT FK_31C5EFCB93DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id)');
        $this->addSql('CREATE INDEX IDX_31C5EFCB2C4DE6DA ON pres_medic (medication_id)');
        $this->addSql('CREATE INDEX IDX_31C5EFCB93DB413D ON pres_medic (prescription_id)');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9C95365BC');
        $this->addSql('DROP INDEX IDX_1FBFB8D9C95365BC ON prescription');
        $this->addSql('ALTER TABLE prescription DROP pres_medic_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medication ADD pres_medic_id INT DEFAULT NULL, ADD pharm_medic_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medication ADD CONSTRAINT FK_5AEE5B70C95365BC FOREIGN KEY (pres_medic_id) REFERENCES pres_medic (id)');
        $this->addSql('ALTER TABLE medication ADD CONSTRAINT FK_5AEE5B70D6DBC314 FOREIGN KEY (pharm_medic_id) REFERENCES pharm_medic (id)');
        $this->addSql('CREATE INDEX IDX_5AEE5B70D6DBC314 ON medication (pharm_medic_id)');
        $this->addSql('CREATE INDEX IDX_5AEE5B70C95365BC ON medication (pres_medic_id)');
        $this->addSql('ALTER TABLE pharm_medic DROP FOREIGN KEY FK_A74104AB8A94ABE2');
        $this->addSql('ALTER TABLE pharm_medic DROP FOREIGN KEY FK_A74104AB2C4DE6DA');
        $this->addSql('DROP INDEX IDX_A74104AB8A94ABE2 ON pharm_medic');
        $this->addSql('DROP INDEX IDX_A74104AB2C4DE6DA ON pharm_medic');
        $this->addSql('ALTER TABLE pharm_medic DROP pharmacy_id, DROP medication_id');
        $this->addSql('ALTER TABLE pharmacy ADD pharm_medic_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pharmacy ADD CONSTRAINT FK_D6C15C1ED6DBC314 FOREIGN KEY (pharm_medic_id) REFERENCES pharm_medic (id)');
        $this->addSql('CREATE INDEX IDX_D6C15C1ED6DBC314 ON pharmacy (pharm_medic_id)');
        $this->addSql('ALTER TABLE pres_medic DROP FOREIGN KEY FK_31C5EFCB2C4DE6DA');
        $this->addSql('ALTER TABLE pres_medic DROP FOREIGN KEY FK_31C5EFCB93DB413D');
        $this->addSql('DROP INDEX IDX_31C5EFCB2C4DE6DA ON pres_medic');
        $this->addSql('DROP INDEX IDX_31C5EFCB93DB413D ON pres_medic');
        $this->addSql('ALTER TABLE pres_medic DROP medication_id, DROP prescription_id');
        $this->addSql('ALTER TABLE prescription ADD pres_medic_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9C95365BC FOREIGN KEY (pres_medic_id) REFERENCES pres_medic (id)');
        $this->addSql('CREATE INDEX IDX_1FBFB8D9C95365BC ON prescription (pres_medic_id)');
    }
}
