<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210115185931 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise CHANGE adresse adresse VARCHAR(400) NOT NULL, CHANGE milieu milieu VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE intitule intitule VARCHAR(50) NOT NULL, CHANGE niveau niveau VARCHAR(60) NOT NULL, CHANGE ville ville VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93695200282E');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369A4AEAFEA');
        $this->addSql('DROP INDEX IDX_C27C9369A4AEAFEA ON stage');
        $this->addSql('DROP INDEX IDX_C27C93695200282E ON stage');
        $this->addSql('ALTER TABLE stage ADD form_id INT NOT NULL, ADD entrep_id INT NOT NULL, DROP formation_id, DROP entreprise_id, CHANGE competences_requises competences_requises VARCHAR(100) NOT NULL, CHANGE experience_requise experience_requise VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93695FF69B7D FOREIGN KEY (form_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369C8BC7EBD FOREIGN KEY (entrep_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C93695FF69B7D ON stage (form_id)');
        $this->addSql('CREATE INDEX IDX_C27C9369C8BC7EBD ON stage (entrep_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise CHANGE adresse adresse VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE milieu milieu VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE formation CHANGE intitule intitule VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE niveau niveau VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93695FF69B7D');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369C8BC7EBD');
        $this->addSql('DROP INDEX IDX_C27C93695FF69B7D ON stage');
        $this->addSql('DROP INDEX IDX_C27C9369C8BC7EBD ON stage');
        $this->addSql('ALTER TABLE stage ADD formation_id INT NOT NULL, ADD entreprise_id INT NOT NULL, DROP form_id, DROP entrep_id, CHANGE competences_requises competences_requises VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE experience_requise experience_requise VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93695200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369A4AEAFEA ON stage (entreprise_id)');
        $this->addSql('CREATE INDEX IDX_C27C93695200282E ON stage (formation_id)');
    }
}
