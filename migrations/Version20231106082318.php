<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106082318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, id_immeuble_id INT NOT NULL, id_categorie_id INT NOT NULL, superficie DOUBLE PRECISION NOT NULL, descriptif VARCHAR(255) NOT NULL, INDEX IDX_71A6BD8D7B6443C8 (id_immeuble_id), INDEX IDX_71A6BD8D9F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D7B6443C8 FOREIGN KEY (id_immeuble_id) REFERENCES immeuble (id)');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D9F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8D7B6443C8');
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8D9F34925F');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE categorie');
    }
}
