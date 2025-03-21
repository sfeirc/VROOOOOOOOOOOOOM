-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS vrooooooooooom;
USE vrooooooooooom;

-- Drop tables if they exist
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS vehicule;
DROP TABLE IF EXISTS marque;
DROP TABLE IF EXISTS type_vehicule;
DROP TABLE IF EXISTS status;
DROP TABLE IF EXISTS administrator;
DROP TABLE IF EXISTS client;
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS doctrine_migration_versions;

-- Create tables
CREATE TABLE administrator (
  id int(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(50) NOT NULL,
  last_name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE client (
  id int(11) NOT NULL AUTO_INCREMENT,
  last_name varchar(50) NOT NULL,
  first_name varchar(50) NOT NULL,
  email varchar(180) NOT NULL,
  phone varchar(20) NOT NULL,
  address varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  registration_date datetime NOT NULL,
  profile_photo varchar(255) DEFAULT NULL,
  roles longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(roles)),
  PRIMARY KEY (id),
  UNIQUE KEY UNIQ_C7440455E7927C74 (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE utilisateur (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(180) NOT NULL,
  roles longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(roles)),
  password varchar(255) NOT NULL,
  phone varchar(20) DEFAULT NULL,
  created_at datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  first_name varchar(50) NOT NULL,
  last_name varchar(50) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY UNIQ_1D1C63B3E7927C74 (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE doctrine_migration_versions (
  version varchar(191) NOT NULL,
  executed_at datetime DEFAULT NULL,
  execution_time int(11) DEFAULT NULL,
  PRIMARY KEY (version)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE status (
  id varchar(50) NOT NULL,
  type varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE type_vehicule (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL,
  description longtext DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE marque (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL,
  logo varchar(255) DEFAULT NULL,
  description longtext DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE vehicule (
  id int(11) NOT NULL AUTO_INCREMENT,
  status_id varchar(50) NOT NULL,
  brand_entity_id int(11) NOT NULL,
  type_entity_id int(11) NOT NULL,
  modele varchar(100) NOT NULL,
  annee int(11) NOT NULL,
  transmission varchar(50) NOT NULL,
  energie varchar(50) DEFAULT NULL,
  prix_journalier decimal(15,2) DEFAULT NULL,
  description longtext DEFAULT NULL,
  image_principale varchar(255) DEFAULT NULL,
  images_supplementaires longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(images_supplementaires)),
  doors int(11) DEFAULT NULL,
  color varchar(50) DEFAULT NULL,
  power int(11) DEFAULT NULL,
  seats int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY IDX_292FFF1D6BF700BD (status_id),
  KEY IDX_292FFF1DEB526D3C (brand_entity_id),
  KEY IDX_292FFF1D35E33C4D (type_entity_id),
  CONSTRAINT FK_292FFF1D35E33C4D FOREIGN KEY (type_entity_id) REFERENCES type_vehicule (id),
  CONSTRAINT FK_292FFF1D6BF700BD FOREIGN KEY (status_id) REFERENCES status (id),
  CONSTRAINT FK_292FFF1DEB526D3C FOREIGN KEY (brand_entity_id) REFERENCES marque (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE reservation (
  id varchar(50) NOT NULL,
  status varchar(20) NOT NULL,
  client_id int(11) NOT NULL,
  car_id int(11) NOT NULL,
  start_date datetime NOT NULL,
  end_date datetime NOT NULL,
  amount decimal(15,2) NOT NULL,
  reservation_date datetime NOT NULL,
  PRIMARY KEY (id),
  KEY IDX_42C8495519EB6921 (client_id),
  KEY IDX_42C84955C3C6F69F (car_id),
  CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id),
  CONSTRAINT FK_42C84955C3C6F69F FOREIGN KEY (car_id) REFERENCES vehicule (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert initial data
INSERT INTO status (id, type) VALUES
('disponible', 'Disponible'),
('maintenance', 'En maintenance'),
('reserve', 'Réservé');

INSERT INTO type_vehicule (id, nom, description) VALUES
(1, 'Berline', 'Voiture de tourisme à carrosserie fermée'),
(2, 'SUV', 'Sport Utility Vehicle'),
(3, 'Coupé', 'Voiture à deux portes'),
(4, 'Supercar', 'Voiture de sport haut de gamme'),
(5, 'Break', 'Voiture familiale avec hayon'),
(6, 'Citadine', 'Petite voiture urbaine');

INSERT INTO marque (id, nom, logo, description) VALUES
(1, 'Audi', NULL, 'Constructeur automobile allemand'),
(2, 'BMW', NULL, 'Constructeur automobile allemand'),
(3, 'Chevrolet', NULL, 'Constructeur automobile américain'),
(4, 'Ferrari', NULL, 'Constructeur automobile italien'),
(5, 'Ford', NULL, 'Constructeur automobile américain'),
(6, 'Lamborghini', NULL, 'Constructeur automobile italien'),
(7, 'Mercedes-Benz', NULL, 'Constructeur automobile allemand'),
(8, 'Peugeot', NULL, 'Constructeur automobile français'),
(9, 'Porsche', NULL, 'Constructeur automobile allemand'),
(10, 'Renault', NULL, 'Constructeur automobile français'),
(11, 'Tesla', NULL, 'Constructeur automobile américain'),
(12, 'Toyota', NULL, 'Constructeur automobile japonais'),
(13, 'Volkswagen', NULL, 'Constructeur automobile allemand');

-- Insert test user
INSERT INTO utilisateur (email, roles, password, phone, created_at, first_name, last_name) 
VALUES ('admin@vrooooooooooom.fr', '["ROLE_ADMIN"]', '$2y$13$jDmxuRqZVTXEv0Q.WkUdPOaGYnxqXL4D3s4g/HTziUL8FVF5uXIGG', '', '2024-03-21 10:56:27', 'Admin', 'Admin'); 