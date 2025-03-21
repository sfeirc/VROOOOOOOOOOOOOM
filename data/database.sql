-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS vrooooooooooom;
USE vrooooooooooom;

-- Drop tables if they exist
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS vehicule;
DROP TABLE IF EXISTS marque;
DROP TABLE IF EXISTS type_vehicule;
DROP TABLE IF EXISTS status;
DROP TABLE IF EXISTS user;

-- Create tables
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(180) NOT NULL UNIQUE,
    roles JSON NOT NULL,
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    adresse TEXT,
    telephone VARCHAR(20),
    numero_permis VARCHAR(50),
    date_obtention_permis DATE,
    UNIQUE INDEX UNIQ_8D93D649E7927C74 (email)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE status (
    id VARCHAR(50) PRIMARY KEY,
    type VARCHAR(50) NOT NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE type_vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description TEXT
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE marque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description TEXT,
    logo VARCHAR(255)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_entity_id INT NOT NULL,
    type_entity_id INT NOT NULL,
    status_id VARCHAR(50) NOT NULL,
    modele VARCHAR(100) NOT NULL,
    doors INT,
    transmission VARCHAR(50) NOT NULL,
    annee INT NOT NULL,
    color VARCHAR(50),
    image_principale VARCHAR(255),
    images_supplementaires JSON,
    energie VARCHAR(50),
    power INT,
    prix_journalier DECIMAL(15,2),
    description TEXT,
    seats INT,
    CONSTRAINT FK_292FFF1D4F5D008 FOREIGN KEY (brand_entity_id) REFERENCES marque (id),
    CONSTRAINT FK_292FFF1D714819A0 FOREIGN KEY (type_entity_id) REFERENCES type_vehicule (id),
    CONSTRAINT FK_292FFF1D6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    user_id INT NOT NULL,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    prix_total DECIMAL(10,2) NOT NULL,
    status VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    CONSTRAINT FK_42C84955C3C6F69F FOREIGN KEY (car_id) REFERENCES vehicule (id),
    CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Insert initial data
INSERT INTO status (id, type) VALUES
('disponible', 'Disponible'),
('maintenance', 'En maintenance'),
('reserve', 'Réservé');

INSERT INTO type_vehicule (id, nom, description) VALUES
(1, 'Berline', 'Voiture à coffre fermé, traditionnellement avec 4 portes'),
(2, 'SUV', 'Sport Utility Vehicle, véhicule surélevé polyvalent'),
(3, 'Coupé', 'Voiture sportive à 2 portes'),
(4, 'Supercar', 'Voiture de sport haute performance'),
(5, 'Break', 'Voiture familiale avec grand espace de chargement'),
(6, 'Citadine', 'Petite voiture adaptée à la ville');

INSERT INTO marque (id, nom, description, logo) VALUES
(1, 'Audi', 'Constructeur automobile allemand haut de gamme', 'audi-logo.png'),
(2, 'BMW', 'Constructeur automobile allemand de luxe', 'bmw-logo.png'),
(3, 'Chevrolet', 'Constructeur automobile américain', 'chevrolet-logo.png'),
(4, 'Ferrari', 'Constructeur automobile italien de voitures de sport', 'ferrari-logo.png'),
(5, 'Ford', 'Constructeur automobile américain', 'ford-logo.png'),
(6, 'Lamborghini', 'Constructeur automobile italien de supercars', 'lamborghini-logo.png'),
(7, 'Mercedes', 'Constructeur automobile allemand de luxe', 'mercedes-logo.png'),
(8, 'Peugeot', 'Constructeur automobile français', 'peugeot-logo.png'),
(9, 'Porsche', 'Constructeur automobile allemand de voitures de sport', 'porsche-logo.png'),
(10, 'Renault', 'Constructeur automobile français', 'renault-logo.png'),
(11, 'Tesla', 'Constructeur automobile américain de voitures électriques', 'tesla-logo.png'),
(12, 'Toyota', 'Constructeur automobile japonais', 'toyota-logo.png'),
(13, 'Volkswagen', 'Constructeur automobile allemand', 'volkswagen-logo.png');

-- Insert an admin user (password is 'admin')
INSERT INTO user (email, roles, password, nom, prenom, date_naissance, adresse, telephone, numero_permis, date_obtention_permis)
VALUES ('admin@vrooooooooooom.fr', '["ROLE_ADMIN"]', '$2y$13$jDmxuRqZVTXEv0Q.WkUdPOaGYnxqXL4D3s4g/HTziUL8FVF5uXIGG', 'Admin', 'Admin', '1990-01-01', '1 rue de l\'administration', '0123456789', 'ADMIN123', '2010-01-01'); 