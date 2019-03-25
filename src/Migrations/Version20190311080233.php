<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190311080233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE role (ID_ROLE INT AUTO_INCREMENT NOT NULL, NOM_ROLE VARCHAR(100) NOT NULL, PRIMARY KEY(ID_ROLE)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE billetterie CHANGE NUMERO_BILLET NUMERO_BILLET VARCHAR(20) NOT NULL, CHANGE ID_MATCHS ID_MATCHS INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reserver DROP QUANTITE_BILLET, DROP DATE_ACHAT_BILLET');
        $this->addSql('ALTER TABLE reserver RENAME INDEX reserver_user0_fk TO IDX_B9765E93F8371B55');
        $this->addSql('ALTER TABLE acheter DROP QUANTITE_ARTICLE, DROP TAILLE_ARTICLE, DROP DATE_ACHAT_ARTICLE');
        $this->addSql('ALTER TABLE acheter RENAME INDEX acheter_user0_fk TO IDX_6E0E9118F8371B55');
        $this->addSql('ALTER TABLE classement CHANGE ID_JOURNEE ID_JOURNEE INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competition CHANGE ID_EQUIPE ID_EQUIPE INT DEFAULT NULL');
        $this->addSql('ALTER TABLE departements CHANGE CODE_DEPARTEMENT CODE_DEPARTEMENT VARCHAR(6) NOT NULL, CHANGE CODE_REGIONS CODE_REGIONS VARCHAR(6) DEFAULT NULL');
        $this->addSql('ALTER TABLE equipes CHANGE ID_VILLE ID_VILLE INT DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur_mois CHANGE ID_EQUIPE ID_EQUIPE INT DEFAULT NULL');
        $this->addSql('ALTER TABLE joueurs_equipe CHANGE ID_EQUIPE ID_EQUIPE INT DEFAULT NULL, CHANGE ID_NATIONALITE ID_NATIONALITE VARCHAR(3) DEFAULT NULL');
        $this->addSql('ALTER TABLE journee CHANGE ID_SAISON ID_SAISON INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matchs CHANGE ID_EQUIPE ID_EQUIPE INT DEFAULT NULL, CHANGE ID_JOURNEE ID_JOURNEE INT DEFAULT NULL, CHANGE ID_EQUIPE_EQUIPES ID_EQUIPE_EQUIPES INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jouer RENAME INDEX jouer_joueurs_equipe0_fk TO IDX_825E5AED5D10566');
        $this->addSql('ALTER TABLE nationalite CHANGE ID_NATIONALITE ID_NATIONALITE VARCHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE news CHANGE ID_EQUIPE ID_EQUIPE INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nouvelles_regions CHANGE CODE_NOUVELLES_REGIONS CODE_NOUVELLES_REGIONS VARCHAR(5) NOT NULL');
        $this->addSql('ALTER TABLE regions CHANGE CODE_REGIONS CODE_REGIONS VARCHAR(6) NOT NULL, CHANGE CODE_NOUVELLES_REGIONS CODE_NOUVELLES_REGIONS VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE englober RENAME INDEX englober_competition0_fk TO IDX_E10494495E014083');
        $this->addSql('ALTER TABLE sponsoriser RENAME INDEX sponsoriser_equipes0_fk TO IDX_AD9DD99E8901288B');
        $this->addSql('ALTER TABLE staff CHANGE ID_EQUIPE ID_EQUIPE INT DEFAULT NULL, CHANGE ID_ROLE_STAFF ID_ROLE_STAFF INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD reset_token VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville CHANGE CODE_DEPARTEMENT CODE_DEPARTEMENT VARCHAR(6) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE role');
        $this->addSql('ALTER TABLE acheter ADD QUANTITE_ARTICLE INT NOT NULL, ADD TAILLE_ARTICLE VARCHAR(5) DEFAULT NULL COLLATE utf8_general_ci, ADD DATE_ACHAT_ARTICLE DATE NOT NULL');
        $this->addSql('ALTER TABLE acheter RENAME INDEX idx_6e0e9118f8371b55 TO ACHETER_USER0_FK');
        $this->addSql('ALTER TABLE billetterie CHANGE NUMERO_BILLET NUMERO_BILLET VARCHAR(20) NOT NULL COLLATE utf8_general_ci, CHANGE ID_MATCHS ID_MATCHS INT NOT NULL');
        $this->addSql('ALTER TABLE classement CHANGE ID_JOURNEE ID_JOURNEE INT NOT NULL');
        $this->addSql('ALTER TABLE competition CHANGE ID_EQUIPE ID_EQUIPE INT NOT NULL');
        $this->addSql('ALTER TABLE departements CHANGE CODE_DEPARTEMENT CODE_DEPARTEMENT VARCHAR(6) NOT NULL COLLATE utf8_general_ci, CHANGE CODE_REGIONS CODE_REGIONS VARCHAR(6) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE englober RENAME INDEX idx_e10494495e014083 TO ENGLOBER_COMPETITION0_FK');
        $this->addSql('ALTER TABLE equipes CHANGE ID_VILLE ID_VILLE INT NOT NULL');
        $this->addSql('ALTER TABLE jouer RENAME INDEX idx_825e5aed5d10566 TO JOUER_JOUEURS_EQUIPE0_FK');
        $this->addSql('ALTER TABLE joueur_mois CHANGE ID_EQUIPE ID_EQUIPE INT NOT NULL');
        $this->addSql('ALTER TABLE joueurs_equipe CHANGE ID_EQUIPE ID_EQUIPE INT NOT NULL, CHANGE ID_NATIONALITE ID_NATIONALITE VARCHAR(3) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE journee CHANGE ID_SAISON ID_SAISON INT NOT NULL');
        $this->addSql('ALTER TABLE matchs CHANGE ID_EQUIPE_EQUIPES ID_EQUIPE_EQUIPES INT NOT NULL, CHANGE ID_EQUIPE ID_EQUIPE INT NOT NULL, CHANGE ID_JOURNEE ID_JOURNEE INT NOT NULL');
        $this->addSql('ALTER TABLE nationalite CHANGE ID_NATIONALITE ID_NATIONALITE VARCHAR(3) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE news CHANGE ID_EQUIPE ID_EQUIPE INT NOT NULL');
        $this->addSql('ALTER TABLE nouvelles_regions CHANGE CODE_NOUVELLES_REGIONS CODE_NOUVELLES_REGIONS VARCHAR(5) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE regions CHANGE CODE_REGIONS CODE_REGIONS VARCHAR(6) NOT NULL COLLATE utf8_general_ci, CHANGE CODE_NOUVELLES_REGIONS CODE_NOUVELLES_REGIONS VARCHAR(5) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE reserver ADD QUANTITE_BILLET INT NOT NULL, ADD DATE_ACHAT_BILLET DATE NOT NULL');
        $this->addSql('ALTER TABLE reserver RENAME INDEX idx_b9765e93f8371b55 TO RESERVER_USER0_FK');
        $this->addSql('ALTER TABLE sponsoriser RENAME INDEX idx_ad9dd99e8901288b TO SPONSORISER_EQUIPES0_FK');
        $this->addSql('ALTER TABLE staff CHANGE ID_EQUIPE ID_EQUIPE INT NOT NULL, CHANGE ID_ROLE_STAFF ID_ROLE_STAFF INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP reset_token');
        $this->addSql('ALTER TABLE ville CHANGE CODE_DEPARTEMENT CODE_DEPARTEMENT VARCHAR(6) NOT NULL COLLATE utf8_general_ci');
    }
}
