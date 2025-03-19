<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250319143711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, phone VARCHAR(20) NOT NULL, address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, registration_date DATETIME NOT NULL, profile_photo VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', UNIQUE INDEX UNIQ_C7440455E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_vehicule (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', mot_de_passe VARCHAR(255) NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, telephone VARCHAR(20) DEFAULT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, status_id VARCHAR(50) NOT NULL, brand_entity_id INT NOT NULL, type_entity_id INT NOT NULL, marque VARCHAR(100) NOT NULL, modele VARCHAR(100) NOT NULL, annee INT NOT NULL, transmission VARCHAR(20) NOT NULL, energie VARCHAR(20) NOT NULL, type VARCHAR(50) NOT NULL, prix_journalier DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, image_principale VARCHAR(255) NOT NULL, images_supplementaires JSON NOT NULL COMMENT \'(DC2Type:json)\', disponible TINYINT(1) NOT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', doors INT DEFAULT NULL, color VARCHAR(50) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, additional_photos JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', power INT DEFAULT NULL, rental_price NUMERIC(15, 2) DEFAULT NULL, seats INT DEFAULT NULL, INDEX IDX_292FFF1D6BF700BD (status_id), INDEX IDX_292FFF1DEB526D3C (brand_entity_id), INDEX IDX_292FFF1D35E33C4D (type_entity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT NOT NULL, utilisateur_id INT NOT NULL, date_debut DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_fin DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', statut VARCHAR(20) NOT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_42C849554A4A3511 (vehicule_id), INDEX IDX_42C84955FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DEB526D3C FOREIGN KEY (brand_entity_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D35E33C4D FOREIGN KEY (type_entity_id) REFERENCES type_vehicule (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');

        // Insert vehicle types
        $this->addSql('INSERT INTO type_vehicule (nom, description) VALUES 
            ("Berline", "Voiture de tourisme à carrosserie fermée"),
            ("SUV", "Sport Utility Vehicle"),
            ("Coupé", "Voiture à deux portes"),
            ("Supercar", "Voiture de sport haut de gamme"),
            ("Break", "Voiture familiale avec hayon"),
            ("Citadine", "Petite voiture urbaine")');

        // Insert brands
        $this->addSql('INSERT INTO marque (nom, description) VALUES 
            ("Audi", "Constructeur automobile allemand"),
            ("BMW", "Constructeur automobile allemand"),
            ("Chevrolet", "Constructeur automobile américain"),
            ("Ferrari", "Constructeur automobile italien"),
            ("Ford", "Constructeur automobile américain"),
            ("Lamborghini", "Constructeur automobile italien"),
            ("Mercedes-Benz", "Constructeur automobile allemand"),
            ("Peugeot", "Constructeur automobile français"),
            ("Porsche", "Constructeur automobile allemand"),
            ("Renault", "Constructeur automobile français"),
            ("Tesla", "Constructeur automobile américain"),
            ("Toyota", "Constructeur automobile japonais"),
            ("Volkswagen", "Constructeur automobile allemand")');

        // Insert status
        $this->addSql('INSERT INTO status (id, type) VALUES 
            ("disponible", "Disponible"),
            ("reserve", "Réservé"),
            ("maintenance", "En maintenance")');

        // Insert vehicles
        $this->addSql('INSERT INTO vehicule (status_id, brand_entity_id, type_entity_id, marque, modele, annee, transmission, energie, type, prix_journalier, description, image_principale, images_supplementaires, disponible, date_creation, doors, color, power, seats) VALUES 
            ("disponible", 1, 1, "Audi", "RS e-tron GT", 2024, "Automatique", "Électrique", "Berline", 250.00, "La RS e-tron GT combine performance et efficacité", "audi-rs-etron.jpg", "[]", 1, NOW(), 5, "Gris", 637, 5),
            ("disponible", 1, 2, "Audi", "Q8", 2024, "Automatique", "Essence", "SUV", 200.00, "SUV luxueux et performant", "audi-q8.jpg", "[]", 1, NOW(), 5, "Noir", 340, 5),
            ("disponible", 1, 3, "Audi", "R8", 2024, "Automatique", "Essence", "Supercar", 350.00, "Supercar légendaire", "audi-r8.jpg", "[]", 1, NOW(), 2, "Rouge", 620, 4),
            ("disponible", 1, 1, "Audi", "RS6", 2024, "Automatique", "Essence", "Break", 300.00, "Break sportif haut de gamme", "audi-rs6.jpg", "[]", 1, NOW(), 5, "Gris", 600, 5),
            ("disponible", 2, 3, "BMW", "i8", 2024, "Automatique", "Hybride", "Supercar", 300.00, "Supercar hybride du futur", "bmw-i8.jpg", "[]", 1, NOW(), 2, "Blanc", 374, 4),
            ("disponible", 2, 3, "BMW", "M3", 2024, "Automatique", "Essence", "Coupé", 200.00, "Coupé sportif emblématique", "bmw-m3.jpg", "[]", 1, NOW(), 4, "Bleu", 510, 5),
            ("disponible", 2, 3, "BMW", "M4", 2024, "Automatique", "Essence", "Coupé", 220.00, "Coupé sportif haut de gamme", "bmw-m4.jpg", "[]", 1, NOW(), 4, "Noir", 510, 5),
            ("disponible", 2, 2, "BMW", "X5", 2024, "Automatique", "Essence", "SUV", 180.00, "SUV luxueux et polyvalent", "bmw-x5.jpg", "[]", 1, NOW(), 5, "Blanc", 340, 5),
            ("disponible", 2, 2, "BMW", "X5M", 2024, "Automatique", "Essence", "SUV", 250.00, "SUV sportif ultra-performant", "bmw-x5m.jpg", "[]", 1, NOW(), 5, "Noir", 625, 5),
            ("disponible", 3, 3, "Chevrolet", "Camaro", 2024, "Manuelle", "Essence", "Coupé", 150.00, "Muscle car américain légendaire", "chevrolet-camaro.jpg", "[]", 1, NOW(), 2, "Jaune", 455, 4),
            ("disponible", 3, 3, "Chevrolet", "Corvette", 2024, "Automatique", "Essence", "Supercar", 300.00, "Supercar américaine iconique", "chevrolet-corvette.jpg", "[]", 1, NOW(), 2, "Rouge", 495, 4),
            ("disponible", 3, 2, "Chevrolet", "Tahoe", 2024, "Automatique", "Essence", "SUV", 180.00, "SUV familial spacieux", "chevrolet-tahoe.jpg", "[]", 1, NOW(), 5, "Noir", 355, 8),
            ("disponible", 4, 3, "Ferrari", "812", 2024, "Automatique", "Essence", "Supercar", 500.00, "Supercar italienne exceptionnelle", "ferrari-812.jpg", "[]", 1, NOW(), 2, "Rouge", 830, 4),
            ("disponible", 4, 3, "Ferrari", "F8", 2024, "Automatique", "Essence", "Supercar", 450.00, "Supercar sportive et élégante", "ferrari-f8.jpg", "[]", 1, NOW(), 2, "Rouge", 710, 4),
            ("disponible", 4, 3, "Ferrari", "SF90", 2024, "Automatique", "Hybride", "Supercar", 600.00, "Supercar hybride de pointe", "ferrari-sf90.jpg", "[]", 1, NOW(), 2, "Rouge", 1000, 4),
            ("disponible", 5, 2, "Ford", "Explorer", 2024, "Automatique", "Essence", "SUV", 150.00, "SUV familial polyvalent", "ford-explorer.jpg", "[]", 1, NOW(), 5, "Blanc", 300, 7),
            ("disponible", 5, 2, "Ford", "F-150", 2024, "Automatique", "Essence", "SUV", 180.00, "Pick-up américain légendaire", "ford-f150.jpg", "[]", 1, NOW(), 4, "Rouge", 400, 5),
            ("disponible", 5, 3, "Ford", "GT", 2024, "Automatique", "Essence", "Supercar", 400.00, "Supercar américaine exclusive", "ford-gt.jpg", "[]", 1, NOW(), 2, "Bleu", 660, 4),
            ("disponible", 5, 3, "Ford", "Mustang", 2024, "Manuelle", "Essence", "Coupé", 160.00, "Muscle car américain iconique", "ford-mustang.jpg", "[]", 1, NOW(), 2, "Rouge", 450, 4),
            ("disponible", 5, 2, "Ford", "Raptor", 2024, "Automatique", "Essence", "SUV", 200.00, "Pick-up sportif haute performance", "ford-raptor.jpg", "[]", 1, NOW(), 4, "Orange", 450, 5),
            ("disponible", 6, 3, "Lamborghini", "Aventador", 2024, "Automatique", "Essence", "Supercar", 600.00, "Supercar italienne spectaculaire", "lambo-aventador.jpg", "[]", 1, NOW(), 2, "Jaune", 770, 4),
            ("disponible", 6, 3, "Lamborghini", "Huracan", 2024, "Automatique", "Essence", "Supercar", 500.00, "Supercar sportive et agressive", "lambo-huracan.jpg", "[]", 1, NOW(), 2, "Orange", 610, 4),
            ("disponible", 6, 2, "Lamborghini", "Urus", 2024, "Automatique", "Essence", "SUV", 400.00, "SUV luxueux et performant", "lambo-urus.jpg", "[]", 1, NOW(), 5, "Noir", 650, 5),
            ("disponible", 7, 3, "Mercedes-Benz", "AMG GT", 2024, "Automatique", "Essence", "Supercar", 450.00, "Supercar allemande exclusive", "mercedes-amg-gt.jpg", "[]", 1, NOW(), 2, "Gris", 585, 4),
            ("disponible", 7, 2, "Mercedes-Benz", "G63", 2024, "Automatique", "Essence", "SUV", 350.00, "SUV luxueux et puissant", "mercedes-g63.jpg", "[]", 1, NOW(), 5, "Noir", 585, 5),
            ("disponible", 7, 2, "Mercedes-Benz", "GLE", 2024, "Automatique", "Essence", "SUV", 200.00, "SUV familial luxueux", "mercedes-gle.jpg", "[]", 1, NOW(), 5, "Gris", 367, 5),
            ("disponible", 7, 3, "Mercedes-Benz", "GT Black", 2024, "Automatique", "Essence", "Supercar", 500.00, "Supercar exclusive en édition limitée", "mercedes-gt-black.jpg", "[]", 1, NOW(), 2, "Noir", 730, 4),
            ("disponible", 7, 1, "Mercedes-Benz", "SL", 2024, "Automatique", "Essence", "Berline", 250.00, "Cabriolet luxueux et sportif", "mercedes-sl.jpg", "[]", 1, NOW(), 2, "Rouge", 585, 4),
            ("disponible", 8, 6, "Peugeot", "208", 2024, "Automatique", "Essence", "Citadine", 80.00, "Citadine moderne et économique", "peugeot-208.jpg", "[]", 1, NOW(), 5, "Blanc", 130, 5),
            ("disponible", 8, 2, "Peugeot", "3008", 2024, "Automatique", "Essence", "SUV", 120.00, "SUV familial moderne", "peugeot-3008.jpg", "[]", 1, NOW(), 5, "Gris", 180, 5),
            ("disponible", 8, 1, "Peugeot", "508", 2024, "Automatique", "Essence", "Berline", 100.00, "Berline élégante et confortable", "peugeot-508.jpg", "[]", 1, NOW(), 5, "Noir", 225, 5),
            ("disponible", 9, 3, "Porsche", "911", 2024, "Automatique", "Essence", "Coupé", 300.00, "Coupé sportif légendaire", "porsche-911.jpg", "[]", 1, NOW(), 2, "Rouge", 385, 4),
            ("disponible", 9, 2, "Porsche", "Cayenne", 2024, "Automatique", "Essence", "SUV", 250.00, "SUV sportif haut de gamme", "porsche-cayenne.jpg", "[]", 1, NOW(), 5, "Noir", 340, 5),
            ("disponible", 9, 3, "Porsche", "GT3 RS", 2024, "Manuelle", "Essence", "Supercar", 400.00, "Supercar de circuit", "porsche-gt3rs.jpg", "[]", 1, NOW(), 2, "Jaune", 525, 4),
            ("disponible", 9, 1, "Porsche", "Taycan", 2024, "Automatique", "Électrique", "Berline", 280.00, "Berline électrique sportive", "porsche-taycan.jpg", "[]", 1, NOW(), 5, "Blanc", 761, 5),
            ("disponible", 10, 6, "Renault", "Captur", 2024, "Automatique", "Essence", "Citadine", 70.00, "Citadine urbaine moderne", "renault-captur.jpg", "[]", 1, NOW(), 5, "Blanc", 90, 5),
            ("disponible", 10, 3, "Renault", "Megane RS", 2024, "Manuelle", "Essence", "Coupé", 120.00, "Coupé sportif français", "renault-megane-rs.jpg", "[]", 1, NOW(), 3, "Jaune", 300, 5),
            ("disponible", 10, 1, "Renault", "Talisman", 2024, "Automatique", "Essence", "Berline", 100.00, "Berline familiale confortable", "renault-talisman.jpg", "[]", 1, NOW(), 5, "Gris", 200, 5),
            ("disponible", 11, 1, "Tesla", "Model 3", 2024, "Automatique", "Électrique", "Berline", 150.00, "Berline électrique performante", "tesla-model-3.jpg", "[]", 1, NOW(), 5, "Rouge", 283, 5),
            ("disponible", 11, 1, "Tesla", "Model S", 2024, "Automatique", "Électrique", "Berline", 200.00, "Berline électrique luxueuse", "tesla-model-s.jpg", "[]", 1, NOW(), 5, "Blanc", 670, 5),
            ("disponible", 11, 2, "Tesla", "Model X", 2024, "Automatique", "Électrique", "SUV", 250.00, "SUV électrique innovant", "tesla-model-x.jpg", "[]", 1, NOW(), 5, "Noir", 670, 7),
            ("disponible", 12, 1, "Toyota", "Camry", 2024, "Automatique", "Essence", "Berline", 100.00, "Berline fiable et économique", "toyota-camry.jpg", "[]", 1, NOW(), 5, "Gris", 203, 5),
            ("disponible", 12, 6, "Toyota", "GR Yaris", 2024, "Manuelle", "Essence", "Citadine", 120.00, "Citadine sportive", "toyota-gryaris.jpg", "[]", 1, NOW(), 3, "Rouge", 261, 4),
            ("disponible", 12, 2, "Toyota", "Land Cruiser", 2024, "Automatique", "Essence", "SUV", 180.00, "SUV tout-terrain robuste", "toyota-landcruiser.jpg", "[]", 1, NOW(), 5, "Blanc", 409, 7),
            ("disponible", 12, 2, "Toyota", "RAV4", 2024, "Automatique", "Hybride", "SUV", 130.00, "SUV hybride populaire", "toyota-rav4.jpg", "[]", 1, NOW(), 5, "Rouge", 219, 5),
            ("disponible", 12, 3, "Toyota", "Supra", 2024, "Automatique", "Essence", "Coupé", 200.00, "Coupé sportif légendaire", "toyota-supra.jpg", "[]", 1, NOW(), 2, "Jaune", 382, 4),
            ("disponible", 13, 1, "Volkswagen", "Arteon", 2024, "Automatique", "Essence", "Berline", 120.00, "Berline élégante et spacieuse", "vw-arteon.jpg", "[]", 1, NOW(), 5, "Noir", 280, 5),
            ("disponible", 13, 3, "Volkswagen", "Golf GTI", 2024, "Manuelle", "Essence", "Coupé", 100.00, "Coupé sportif populaire", "vw-golf-gti.jpg", "[]", 1, NOW(), 3, "Rouge", 245, 5),
            ("disponible", 13, 2, "Volkswagen", "Tiguan", 2024, "Automatique", "Essence", "SUV", 110.00, "SUV familial polyvalent", "vw-tiguan.jpg", "[]", 1, NOW(), 5, "Blanc", 190, 5)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554A4A3511');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FB88E14F');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D6BF700BD');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DEB526D3C');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D35E33C4D');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE type_vehicule');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vehicule');
    }
}
