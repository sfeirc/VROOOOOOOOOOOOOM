-- Audi
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(1, 1, 'disponible', 'e-tron GT', 2024, 'Automatique', 'Électrique', 200.00, 'Berline électrique sportive d''Audi, alliant performance et luxe.', 'audi-etron-gt.jpg', 4, 'Gris', 476, 5),
(1, 2, 'disponible', 'Q8', 2024, 'Automatique', 'Hybride', 180.00, 'SUV coupé haut de gamme d''Audi, combinant élégance et performance.', 'audi-q8.jpg', 5, 'Noir', 340, 5),
(1, 4, 'disponible', 'R8', 2024, 'Automatique', 'Essence', 500.00, 'Supercar emblématique d''Audi, offrant des performances exceptionnelles.', 'audi-r8.jpg', 2, 'Rouge', 570, 2),
(1, 5, 'disponible', 'RS6', 2024, 'Automatique', 'Essence', 300.00, 'Break haute performance d''Audi, combinant praticité et puissance.', 'audi-rs6.jpg', 5, 'Bleu', 600, 5),
(1, 1, 'disponible', 'RS e-tron', 2024, 'Automatique', 'Électrique', 250.00, 'Version sportive de l''e-tron GT, offrant des performances électriques supérieures.', 'audi-rs-etron.jpg', 4, 'Gris', 598, 5);

-- BMW
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(2, 4, 'disponible', 'i8', 2023, 'Automatique', 'Hybride', 400.00, 'Supercar hybride futuriste de BMW.', 'bmw-i8.jpg', 2, 'Blanc', 374, 2),
(2, 1, 'disponible', 'M3', 2024, 'Automatique', 'Essence', 250.00, 'Berline sportive emblématique de BMW.', 'bmw-m3.jpg', 4, 'Bleu', 510, 5),
(2, 1, 'disponible', 'M4', 2024, 'Automatique', 'Essence', 270.00, 'Coupé sportif haute performance de BMW.', 'bmw-m4.jpg', 2, 'Jaune', 510, 4),
(2, 2, 'disponible', 'X5', 2024, 'Automatique', 'Diesel', 200.00, 'SUV luxueux et polyvalent de BMW.', 'bmw-x5.jpg', 5, 'Noir', 340, 5),
(2, 2, 'disponible', 'X5M', 2024, 'Automatique', 'Essence', 300.00, 'Version haute performance du X5.', 'bmw-x5m.jpg', 5, 'Bleu', 625, 5);

-- Chevrolet
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(3, 3, 'disponible', 'Camaro', 2024, 'Manuelle', 'Essence', 200.00, 'Muscle car américaine emblématique.', 'chevrolet-camaro.jpg', 2, 'Jaune', 455, 4),
(3, 4, 'disponible', 'Corvette', 2024, 'Automatique', 'Essence', 400.00, 'Supercar américaine légendaire.', 'chevrolet-corvette.jpg', 2, 'Rouge', 495, 2),
(3, 2, 'disponible', 'Tahoe', 2024, 'Automatique', 'Essence', 180.00, 'Grand SUV américain confortable.', 'chevrolet-tahoe.jpg', 5, 'Noir', 355, 7);

-- Ferrari
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(4, 4, 'disponible', '812', 2024, 'Automatique', 'Essence', 800.00, 'GT haute performance de Ferrari.', 'ferrari-812.jpg', 2, 'Rouge', 800, 2),
(4, 4, 'disponible', 'F8', 2024, 'Automatique', 'Essence', 750.00, 'Supercar emblématique de Ferrari.', 'ferrari-f8.jpg', 2, 'Rouge', 720, 2),
(4, 4, 'disponible', 'SF90', 2024, 'Automatique', 'Hybride', 900.00, 'Hypercar hybride de Ferrari.', 'ferrari-sf90.jpg', 2, 'Rouge', 1000, 2);

-- Ford
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(5, 2, 'disponible', 'Explorer', 2024, 'Automatique', 'Essence', 150.00, 'SUV familial spacieux.', 'ford-explorer.jpg', 5, 'Bleu', 300, 7),
(5, 2, 'disponible', 'F150', 2024, 'Automatique', 'Essence', 160.00, 'Pick-up légendaire américain.', 'ford-f150.jpg', 4, 'Gris', 400, 5),
(5, 4, 'disponible', 'GT', 2024, 'Automatique', 'Essence', 800.00, 'Supercar emblématique de Ford.', 'ford-gt.jpg', 2, 'Bleu', 660, 2),
(5, 3, 'disponible', 'Mustang', 2024, 'Manuelle', 'Essence', 200.00, 'Muscle car légendaire.', 'ford-mustang.jpg', 2, 'Rouge', 450, 4),
(5, 2, 'disponible', 'Raptor', 2024, 'Automatique', 'Essence', 200.00, 'Version tout-terrain du F150.', 'ford-raptor.jpg', 4, 'Bleu', 450, 5);

-- Lamborghini
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(6, 4, 'disponible', 'Aventador', 2024, 'Automatique', 'Essence', 900.00, 'Supercar emblématique de Lamborghini.', 'lambo-aventador.jpg', 2, 'Jaune', 770, 2),
(6, 4, 'disponible', 'Huracan', 2024, 'Automatique', 'Essence', 800.00, 'Supercar agile de Lamborghini.', 'lambo-huracan.jpg', 2, 'Vert', 640, 2),
(6, 2, 'disponible', 'Urus', 2024, 'Automatique', 'Essence', 500.00, 'SUV super sportif de Lamborghini.', 'lambo-urus.jpg', 5, 'Jaune', 650, 5);

-- Mercedes
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(7, 4, 'disponible', 'AMG GT', 2024, 'Automatique', 'Essence', 500.00, 'Supercar élégante de Mercedes.', 'mercedes-amg-gt.jpg', 2, 'Gris', 585, 2),
(7, 1, 'disponible', 'C63', 2024, 'Automatique', 'Hybride', 300.00, 'Berline sportive hybride.', 'mercedes-c63.jpg', 4, 'Noir', 680, 5),
(7, 2, 'disponible', 'G63', 2024, 'Automatique', 'Essence', 400.00, 'SUV iconique haute performance.', 'mercedes-g63.jpg', 5, 'Noir', 585, 5),
(7, 2, 'disponible', 'GLE', 2024, 'Automatique', 'Diesel', 200.00, 'SUV luxueux et confortable.', 'mercedes-gle.jpg', 5, 'Gris', 330, 5),
(7, 4, 'disponible', 'GT Black', 2024, 'Automatique', 'Essence', 600.00, 'Version extrême de l''AMG GT.', 'mercedes-gt-black.jpg', 2, 'Noir', 730, 2),
(7, 3, 'disponible', 'SL', 2024, 'Automatique', 'Essence', 400.00, 'Cabriolet luxueux et sportif.', 'mercedes-sl.jpg', 2, 'Rouge', 585, 2);

-- Peugeot
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(8, 6, 'disponible', '208', 2024, 'Automatique', 'Essence', 80.00, 'Citadine moderne et agile.', 'peugeot-208.jpg', 5, 'Bleu', 130, 5),
(8, 2, 'disponible', '3008', 2024, 'Automatique', 'Hybride', 120.00, 'SUV familial innovant.', 'peugeot-3008.jpg', 5, 'Gris', 225, 5),
(8, 1, 'disponible', '508', 2024, 'Automatique', 'Hybride', 150.00, 'Berline élégante et technologique.', 'peugeot-508.jpg', 4, 'Rouge', 225, 5);

-- Porsche
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(9, 4, 'disponible', '911', 2024, 'Automatique', 'Essence', 500.00, 'Voiture de sport iconique.', 'porsche-911.jpg', 2, 'Gris', 450, 4),
(9, 2, 'disponible', 'Cayenne', 2024, 'Automatique', 'Hybride', 300.00, 'SUV sportif de luxe.', 'porsche-cayenne.jpg', 5, 'Noir', 462, 5),
(9, 4, 'disponible', 'GT3 RS', 2024, 'Automatique', 'Essence', 700.00, 'Version radicale de la 911.', 'porsche-gt3rs.jpg', 2, 'Vert', 525, 2),
(9, 1, 'disponible', 'Taycan', 2024, 'Automatique', 'Électrique', 400.00, 'Berline électrique sportive.', 'porsche-taycan.jpg', 4, 'Blanc', 625, 4);

-- Renault
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(10, 2, 'disponible', 'Captur', 2024, 'Automatique', 'Essence', 80.00, 'SUV urbain pratique.', 'renault-captur.jpg', 5, 'Orange', 140, 5),
(10, 6, 'disponible', 'Megane RS', 2024, 'Manuelle', 'Essence', 150.00, 'Compacte sportive radicale.', 'renault-megane-rs.jpg', 5, 'Jaune', 300, 5),
(10, 1, 'disponible', 'Talisman', 2024, 'Automatique', 'Diesel', 120.00, 'Berline confortable et élégante.', 'renault-talisman.jpg', 4, 'Gris', 190, 5);

-- Tesla
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(11, 1, 'disponible', 'Model 3', 2024, 'Automatique', 'Électrique', 200.00, 'Berline électrique performante.', 'tesla-model-3.jpg', 4, 'Blanc', 513, 5),
(11, 1, 'disponible', 'Model S', 2024, 'Automatique', 'Électrique', 300.00, 'Berline électrique haut de gamme.', 'tesla-model-s.jpg', 4, 'Rouge', 1020, 5),
(11, 2, 'disponible', 'Model X', 2024, 'Automatique', 'Électrique', 350.00, 'SUV électrique avec portes papillon.', 'tesla-model-x.jpg', 5, 'Blanc', 1020, 7);

-- Toyota
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(12, 1, 'disponible', 'Camry', 2024, 'Automatique', 'Hybride', 120.00, 'Berline hybride confortable.', 'toyota-camry.jpg', 4, 'Gris', 218, 5),
(12, 6, 'disponible', 'GR Yaris', 2024, 'Manuelle', 'Essence', 150.00, 'Citadine sportive radicale.', 'toyota-gryaris.jpg', 3, 'Blanc', 261, 4),
(12, 2, 'disponible', 'Land Cruiser', 2024, 'Automatique', 'Diesel', 200.00, 'SUV robuste et luxueux.', 'toyota-landcruiser.jpg', 5, 'Noir', 330, 7),
(12, 2, 'disponible', 'RAV4', 2024, 'Automatique', 'Hybride', 130.00, 'SUV hybride polyvalent.', 'toyota-rav4.jpg', 5, 'Bleu', 222, 5),
(12, 4, 'disponible', 'Supra', 2024, 'Automatique', 'Essence', 300.00, 'Coupé sport légendaire.', 'toyota-supra.jpg', 2, 'Jaune', 340, 2);

-- Volkswagen
INSERT INTO vehicule (brand_entity_id, type_entity_id, status_id, modele, annee, transmission, energie, prix_journalier, description, image_principale, doors, color, power, seats)
VALUES 
(13, 1, 'disponible', 'Arteon', 2024, 'Automatique', 'Essence', 150.00, 'Berline fastback élégante.', 'vw-arteon.jpg', 5, 'Gris', 280, 5),
(13, 6, 'disponible', 'Golf GTI', 2024, 'Automatique', 'Essence', 150.00, 'Compacte sportive iconique.', 'vw-golf-gti.jpg', 5, 'Rouge', 245, 5),
(13, 2, 'disponible', 'Tiguan', 2024, 'Automatique', 'Diesel', 130.00, 'SUV compact polyvalent.', 'vw-tiguan.jpg', 5, 'Blanc', 150, 5); 