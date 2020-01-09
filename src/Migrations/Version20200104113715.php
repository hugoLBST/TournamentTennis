<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200104113715 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(50) NOT NULL, date_naissance DATE NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, niveau VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER set utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, adresse VARCHAR(255) NOT NULL, date_debut_tournoi DATE NOT NULL, date_fin_tournoi DATE NOT NULL, est_visible TINYINT(1) NOT NULL, surface VARCHAR(20) NOT NULL, categorie_age VARCHAR(5) NOT NULL, genre_homme TINYINT(1) NOT NULL, description VARCHAR(255) NOT NULL, date_debut_inscription DATE NOT NULL, date_fin_inscription DATE NOT NULL, inscription_manuelle TINYINT(1) NOT NULL, nombre_places INT NOT NULL, mot_de_passe VARCHAR(50) DEFAULT NULL, validation_inscriptions TINYINT(1) NOT NULL, nb_Sets_gagnants INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER set utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(20) NOT NULL, date_fin DATE NOT NULL, statut VARCHAR(50) NOT NULL, numero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER set utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `match` (id INT AUTO_INCREMENT NOT NULL, etat VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER set utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `set` (id INT AUTO_INCREMENT NOT NULL, nb_jeu_du_gagnant INT NOT NULL, nb_jeu_du_perdant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER set utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE tour');
        $this->addSql('DROP TABLE `match`');
        $this->addSql('DROP TABLE `set`');
    }
}
