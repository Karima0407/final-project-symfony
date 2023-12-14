<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231213095539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bijoux (id_bijoux INT AUTO_INCREMENT NOT NULL, image_bijoux VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, description_detaille LONGTEXT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id_bijoux)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maquillage (id_maquillage INT AUTO_INCREMENT NOT NULL, image_makeup VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, description_detaille LONGTEXT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id_maquillage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montres (id_montres INT AUTO_INCREMENT NOT NULL, image_montre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, description_detaille LONGTEXT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id_montres)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id_users INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, numero_telephone INT NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id_users)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vetements (id_vetements INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, description_detaille LONGTEXT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id_vetements)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bijoux');
        $this->addSql('DROP TABLE maquillage');
        $this->addSql('DROP TABLE montres');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE vetements');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
