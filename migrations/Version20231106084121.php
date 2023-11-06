<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106084121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avoir_pour_tarif (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT NOT NULL, id_saison_id INT NOT NULL, prix_semaine DOUBLE PRECISION NOT NULL, INDEX IDX_F073D5109F34925F (id_categorie_id), INDEX IDX_F073D5107950FD6B (id_saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D5109F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D5107950FD6B FOREIGN KEY (id_saison_id) REFERENCES saison (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D5109F34925F');
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D5107950FD6B');
        $this->addSql('DROP TABLE avoir_pour_tarif');
    }
}
