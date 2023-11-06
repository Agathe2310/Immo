<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106083706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_appart_id INT NOT NULL, date_reserv DATETIME NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, rue_client VARCHAR(255) NOT NULL, cp_client INT NOT NULL, ville_client VARCHAR(255) NOT NULL, tel_client INT NOT NULL, num_cheque_acompte INT NOT NULL, montant_acompte DOUBLE PRECISION NOT NULL, etat_reserv INT NOT NULL, INDEX IDX_42C8495550FB386C (id_appart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, libelle_saison VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semaine (id INT AUTO_INCREMENT NOT NULL, id_saison_id INT NOT NULL, date_debut DATETIME NOT NULL, annee INT NOT NULL, INDEX IDX_7B4D8BEA7950FD6B (id_saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semaine_reservation (semaine_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_F3A573E1122EEC90 (semaine_id), INDEX IDX_F3A573E1B83297E7 (reservation_id), PRIMARY KEY(semaine_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495550FB386C FOREIGN KEY (id_appart_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE semaine ADD CONSTRAINT FK_7B4D8BEA7950FD6B FOREIGN KEY (id_saison_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE semaine_reservation ADD CONSTRAINT FK_F3A573E1122EEC90 FOREIGN KEY (semaine_id) REFERENCES semaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semaine_reservation ADD CONSTRAINT FK_F3A573E1B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495550FB386C');
        $this->addSql('ALTER TABLE semaine DROP FOREIGN KEY FK_7B4D8BEA7950FD6B');
        $this->addSql('ALTER TABLE semaine_reservation DROP FOREIGN KEY FK_F3A573E1122EEC90');
        $this->addSql('ALTER TABLE semaine_reservation DROP FOREIGN KEY FK_F3A573E1B83297E7');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE semaine');
        $this->addSql('DROP TABLE semaine_reservation');
    }
}
