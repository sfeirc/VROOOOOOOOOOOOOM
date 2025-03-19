-- Insert vehicle types
INSERT INTO vehicle_type (name) VALUES
('Berline'),
('SUV'),
('Coupé'),
('Cabriolet'),
('Break'),
('Monospace');

-- Insert statuses
INSERT INTO status (id, type) VALUES
('disponible', 'Disponible'),
('en_location', 'En location'),
('en_maintenance', 'En maintenance'),
('vendu', 'Vendu');

-- Insert brands
INSERT INTO brand (name, logo, description) VALUES
('Tesla', 'tesla.png', 'Fabricant américain de véhicules électriques'),
('Toyota', 'toyota.png', 'Constructeur automobile japonais'),
('Ford', 'ford.png', 'Constructeur automobile américain'),
('BMW', 'bmw.png', 'Constructeur automobile allemand'),
('Mercedes-Benz', 'mercedes.png', 'Constructeur automobile allemand'),
('Audi', 'audi.png', 'Constructeur automobile allemand'),
('Porsche', 'porsche.png', 'Constructeur automobile allemand'),
('Volkswagen', 'vw.png', 'Constructeur automobile allemand'),
('Renault', 'renault.png', 'Constructeur automobile français'),
('Peugeot', 'peugeot.png', 'Constructeur automobile français');

-- Insert cars
INSERT INTO car (model, doors, transmission, year, color, photo, additional_photos, energy, power, rental_price, description, seats, status_id, brand_id, type_id) VALUES
-- Tesla Models
('Model 3', 4, 'Automatique', 2023, 'Rouge', 'tesla-model-3.jpg', '[]', 'Électrique', 283, 89.99, 'La Tesla Model 3 est une berline électrique offrant des performances exceptionnelles et une autonomie impressionnante.', 5, 'disponible', 1, 1),
('Model S', 4, 'Automatique', 2023, 'Noir', 'tesla-model-s.jpg', '[]', 'Électrique', 670, 129.99, 'La Tesla Model S est une berline électrique haut de gamme avec des performances sportives.', 5, 'disponible', 1, 1),
('Model X', 4, 'Automatique', 2023, 'Blanc', 'tesla-model-x.jpg', '[]', 'Électrique', 525, 149.99, 'Le Tesla Model X est un SUV électrique avec des portes papillon et une grande autonomie.', 7, 'disponible', 1, 2),

-- Toyota Models
('GR Yaris', 3, 'Manuelle', 2023, 'Blanc', 'toyota-gryaris.jpg', '[]', 'Essence', 261, 79.99, 'La Toyota GR Yaris est une compacte sportive offrant des performances exceptionnelles.', 4, 'disponible', 2, 3),
('RAV4', 4, 'Automatique', 2023, 'Gris', 'toyota-rav4.jpg', '[]', 'Hybride', 218, 69.99, 'Le Toyota RAV4 est un SUV hybride économique et spacieux.', 5, 'disponible', 2, 2),
('Camry', 4, 'Automatique', 2023, 'Noir', 'toyota-camry.jpg', '[]', 'Hybride', 208, 59.99, 'La Toyota Camry est une berline hybride confortable et économique.', 5, 'disponible', 2, 1),

-- Ford Models
('Mustang GT', 2, 'Automatique', 2023, 'Noir', 'ford-mustang.jpg', '[]', 'Essence', 450, 129.99, 'La Ford Mustang GT est une icône américaine avec des performances impressionnantes.', 4, 'disponible', 3, 3),
('F-150', 4, 'Automatique', 2023, 'Rouge', 'ford-f150.jpg', '[]', 'Essence', 400, 159.99, 'Le Ford F-150 est un pick-up puissant et polyvalent.', 5, 'disponible', 3, 2),
('Explorer', 4, 'Automatique', 2023, 'Blanc', 'ford-explorer.jpg', '[]', 'Essence', 300, 89.99, 'Le Ford Explorer est un SUV familial spacieux et confortable.', 7, 'disponible', 3, 2),

-- BMW Models
('M3', 4, 'Automatique', 2023, 'Bleu', 'bmw-m3.jpg', '[]', 'Essence', 510, 149.99, 'La BMW M3 est une berline sportive offrant des performances exceptionnelles.', 5, 'disponible', 4, 1),
('X5', 4, 'Automatique', 2023, 'Noir', 'bmw-x5.jpg', '[]', 'Diesel', 340, 129.99, 'Le BMW X5 est un SUV luxueux et performant.', 5, 'disponible', 4, 2),
('M4', 2, 'Automatique', 2023, 'Rouge', 'bmw-m4.jpg', '[]', 'Essence', 510, 159.99, 'La BMW M4 est un coupé sportif avec des performances impressionnantes.', 4, 'disponible', 4, 3),

-- Mercedes-Benz Models
('C63 AMG', 4, 'Automatique', 2023, 'Gris', 'mercedes-c63.jpg', '[]', 'Essence', 476, 149.99, 'La Mercedes-Benz C63 AMG est une berline sportive luxueuse.', 5, 'disponible', 5, 1),
('GLE', 4, 'Automatique', 2023, 'Blanc', 'mercedes-gle.jpg', '[]', 'Diesel', 367, 139.99, 'Le Mercedes-Benz GLE est un SUV luxueux et confortable.', 5, 'disponible', 5, 2),
('SL', 2, 'Automatique', 2023, 'Noir', 'mercedes-sl.jpg', '[]', 'Essence', 429, 169.99, 'La Mercedes-Benz SL est un cabriolet luxueux et sportif.', 4, 'disponible', 5, 4),

-- Audi Models
('RS6', 4, 'Automatique', 2023, 'Rouge', 'audi-rs6.jpg', '[]', 'Essence', 600, 159.99, 'L''Audi RS6 est une break sportive avec des performances exceptionnelles.', 5, 'disponible', 6, 5),
('Q8', 4, 'Automatique', 2023, 'Noir', 'audi-q8.jpg', '[]', 'Diesel', 286, 139.99, 'L''Audi Q8 est un SUV luxueux et moderne.', 5, 'disponible', 6, 2),
('RS e-tron GT', 4, 'Automatique', 2023, 'Blanc', 'audi-rs-etron.jpg', '[]', 'Électrique', 646, 179.99, 'L''Audi RS e-tron GT est une berline électrique sportive.', 5, 'disponible', 6, 1),

-- Porsche Models
('911', 2, 'Automatique', 2023, 'Jaune', 'porsche-911.jpg', '[]', 'Essence', 385, 199.99, 'La Porsche 911 est une icône sportive avec des performances légendaires.', 4, 'disponible', 7, 3),
('Cayenne', 4, 'Automatique', 2023, 'Noir', 'porsche-cayenne.jpg', '[]', 'Essence', 340, 169.99, 'Le Porsche Cayenne est un SUV sportif et luxueux.', 5, 'disponible', 7, 2),
('Taycan', 4, 'Automatique', 2023, 'Blanc', 'porsche-taycan.jpg', '[]', 'Électrique', 761, 189.99, 'La Porsche Taycan est une berline électrique sportive.', 5, 'disponible', 7, 1),

-- Volkswagen Models
('Golf GTI', 4, 'Manuelle', 2023, 'Rouge', 'vw-golf-gti.jpg', '[]', 'Essence', 245, 79.99, 'La Volkswagen Golf GTI est une compacte sportive populaire.', 5, 'disponible', 8, 1),
('Tiguan', 4, 'Automatique', 2023, 'Gris', 'vw-tiguan.jpg', '[]', 'Diesel', 150, 69.99, 'Le Volkswagen Tiguan est un SUV familial pratique.', 5, 'disponible', 8, 2),
('Arteon', 4, 'Automatique', 2023, 'Noir', 'vw-arteon.jpg', '[]', 'Essence', 280, 89.99, 'La Volkswagen Arteon est une berline élégante et spacieuse.', 5, 'disponible', 8, 1),

-- Renault Models
('Megane RS', 4, 'Manuelle', 2023, 'Jaune', 'renault-megane-rs.jpg', '[]', 'Essence', 300, 89.99, 'La Renault Megane RS est une compacte sportive française.', 5, 'disponible', 9, 1),
('Captur', 4, 'Automatique', 2023, 'Blanc', 'renault-captur.jpg', '[]', 'Hybride', 140, 59.99, 'Le Renault Captur est un SUV compact économique.', 5, 'disponible', 9, 2),
('Talisman', 4, 'Automatique', 2023, 'Gris', 'renault-talisman.jpg', '[]', 'Diesel', 200, 79.99, 'La Renault Talisman est une berline familiale confortable.', 5, 'disponible', 9, 1),

-- Peugeot Models
('508', 4, 'Automatique', 2023, 'Noir', 'peugeot-508.jpg', '[]', 'Hybride', 225, 69.99, 'La Peugeot 508 est une berline élégante et moderne.', 5, 'disponible', 10, 1),
('3008', 4, 'Automatique', 2023, 'Rouge', 'peugeot-3008.jpg', '[]', 'Hybride', 225, 79.99, 'Le Peugeot 3008 est un SUV familial populaire.', 5, 'disponible', 10, 2),
('208', 4, 'Automatique', 2023, 'Blanc', 'peugeot-208.jpg', '[]', 'Électrique', 136, 49.99, 'La Peugeot 208 est une citadine électrique économique.', 5, 'disponible', 10, 1); 