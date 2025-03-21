<?php

namespace App\Command;

use App\Entity\Car;
use App\Entity\Brand;
use App\Entity\Status;
use App\Entity\VehicleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportCarsCommand extends Command
{
    protected static $defaultName = 'app:import-cars';
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this->setDescription('Import cars into the database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        $cars = [
            // Audi
            ['brand' => 1, 'type' => 1, 'model' => 'e-tron GT', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Électrique', 'price' => 200.00, 'description' => 'Berline électrique sportive d\'Audi, alliant performance et luxe.', 'photo' => 'audi-etron-gt.jpg', 'doors' => 4, 'color' => 'Gris', 'power' => 476, 'seats' => 5],
            ['brand' => 1, 'type' => 2, 'model' => 'Q8', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 180.00, 'description' => 'SUV coupé haut de gamme d\'Audi, combinant élégance et performance.', 'photo' => 'audi-q8.jpg', 'doors' => 5, 'color' => 'Noir', 'power' => 340, 'seats' => 5],
            ['brand' => 1, 'type' => 4, 'model' => 'R8', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 500.00, 'description' => 'Supercar emblématique d\'Audi, offrant des performances exceptionnelles.', 'photo' => 'audi-r8.jpg', 'doors' => 2, 'color' => 'Rouge', 'power' => 570, 'seats' => 2],
            ['brand' => 1, 'type' => 5, 'model' => 'RS6', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 300.00, 'description' => 'Break haute performance d\'Audi, combinant praticité et puissance.', 'photo' => 'audi-rs6.jpg', 'doors' => 5, 'color' => 'Bleu', 'power' => 600, 'seats' => 5],
            ['brand' => 1, 'type' => 1, 'model' => 'RS e-tron', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Électrique', 'price' => 250.00, 'description' => 'Version sportive de l\'e-tron GT, offrant des performances électriques supérieures.', 'photo' => 'audi-rs-etron.jpg', 'doors' => 4, 'color' => 'Gris', 'power' => 598, 'seats' => 5],
            
            // BMW
            ['brand' => 2, 'type' => 4, 'model' => 'i8', 'year' => 2023, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 400.00, 'description' => 'Supercar hybride futuriste de BMW.', 'photo' => 'bmw-i8.jpg', 'doors' => 2, 'color' => 'Blanc', 'power' => 374, 'seats' => 2],
            ['brand' => 2, 'type' => 1, 'model' => 'M3', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 250.00, 'description' => 'Berline sportive emblématique de BMW.', 'photo' => 'bmw-m3.jpg', 'doors' => 4, 'color' => 'Bleu', 'power' => 510, 'seats' => 5],
            ['brand' => 2, 'type' => 1, 'model' => 'M4', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 270.00, 'description' => 'Coupé sportif haute performance de BMW.', 'photo' => 'bmw-m4.jpg', 'doors' => 2, 'color' => 'Jaune', 'power' => 510, 'seats' => 4],
            ['brand' => 2, 'type' => 2, 'model' => 'X5', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Diesel', 'price' => 200.00, 'description' => 'SUV luxueux et polyvalent de BMW.', 'photo' => 'bmw-x5.jpg', 'doors' => 5, 'color' => 'Noir', 'power' => 340, 'seats' => 5],
            ['brand' => 2, 'type' => 2, 'model' => 'X5M', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 300.00, 'description' => 'Version haute performance du X5.', 'photo' => 'bmw-x5m.jpg', 'doors' => 5, 'color' => 'Bleu', 'power' => 625, 'seats' => 5],
            
            // Chevrolet
            ['brand' => 3, 'type' => 3, 'model' => 'Camaro', 'year' => 2024, 'transmission' => 'Manuelle', 'energy' => 'Essence', 'price' => 200.00, 'description' => 'Muscle car américaine emblématique.', 'photo' => 'chevrolet-camaro.jpg', 'doors' => 2, 'color' => 'Jaune', 'power' => 455, 'seats' => 4],
            ['brand' => 3, 'type' => 4, 'model' => 'Corvette', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 400.00, 'description' => 'Supercar américaine légendaire.', 'photo' => 'chevrolet-corvette.jpg', 'doors' => 2, 'color' => 'Rouge', 'power' => 495, 'seats' => 2],
            ['brand' => 3, 'type' => 2, 'model' => 'Tahoe', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 180.00, 'description' => 'Grand SUV américain confortable.', 'photo' => 'chevrolet-tahoe.jpg', 'doors' => 5, 'color' => 'Noir', 'power' => 355, 'seats' => 7],
            
            // Ferrari
            ['brand' => 4, 'type' => 4, 'model' => '812', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 800.00, 'description' => 'GT haute performance de Ferrari.', 'photo' => 'ferrari-812.jpg', 'doors' => 2, 'color' => 'Rouge', 'power' => 800, 'seats' => 2],
            ['brand' => 4, 'type' => 4, 'model' => 'F8', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 750.00, 'description' => 'Supercar emblématique de Ferrari.', 'photo' => 'ferrari-f8.jpg', 'doors' => 2, 'color' => 'Rouge', 'power' => 720, 'seats' => 2],
            ['brand' => 4, 'type' => 4, 'model' => 'SF90', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 900.00, 'description' => 'Hypercar hybride de Ferrari.', 'photo' => 'ferrari-sf90.jpg', 'doors' => 2, 'color' => 'Rouge', 'power' => 1000, 'seats' => 2],
            
            // Ford
            ['brand' => 5, 'type' => 2, 'model' => 'Explorer', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 150.00, 'description' => 'SUV familial spacieux.', 'photo' => 'ford-explorer.jpg', 'doors' => 5, 'color' => 'Bleu', 'power' => 300, 'seats' => 7],
            ['brand' => 5, 'type' => 2, 'model' => 'F150', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 160.00, 'description' => 'Pick-up légendaire américain.', 'photo' => 'ford-f150.jpg', 'doors' => 4, 'color' => 'Gris', 'power' => 400, 'seats' => 5],
            ['brand' => 5, 'type' => 4, 'model' => 'GT', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 800.00, 'description' => 'Supercar emblématique de Ford.', 'photo' => 'ford-gt.jpg', 'doors' => 2, 'color' => 'Bleu', 'power' => 660, 'seats' => 2],
            ['brand' => 5, 'type' => 3, 'model' => 'Mustang', 'year' => 2024, 'transmission' => 'Manuelle', 'energy' => 'Essence', 'price' => 200.00, 'description' => 'Muscle car légendaire.', 'photo' => 'ford-mustang.jpg', 'doors' => 2, 'color' => 'Rouge', 'power' => 450, 'seats' => 4],
            ['brand' => 5, 'type' => 2, 'model' => 'Raptor', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 200.00, 'description' => 'Version tout-terrain du F150.', 'photo' => 'ford-raptor.jpg', 'doors' => 4, 'color' => 'Bleu', 'power' => 450, 'seats' => 5],
            
            // Lamborghini
            ['brand' => 6, 'type' => 4, 'model' => 'Aventador', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 900.00, 'description' => 'Supercar emblématique de Lamborghini.', 'photo' => 'lambo-aventador.jpg', 'doors' => 2, 'color' => 'Jaune', 'power' => 770, 'seats' => 2],
            ['brand' => 6, 'type' => 4, 'model' => 'Huracan', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 800.00, 'description' => 'Supercar agile de Lamborghini.', 'photo' => 'lambo-huracan.jpg', 'doors' => 2, 'color' => 'Vert', 'power' => 640, 'seats' => 2],
            ['brand' => 6, 'type' => 2, 'model' => 'Urus', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 500.00, 'description' => 'SUV super sportif de Lamborghini.', 'photo' => 'lambo-urus.jpg', 'doors' => 5, 'color' => 'Jaune', 'power' => 650, 'seats' => 5],
            
            // Mercedes
            ['brand' => 7, 'type' => 4, 'model' => 'AMG GT', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 500.00, 'description' => 'Supercar élégante de Mercedes.', 'photo' => 'mercedes-amg-gt.jpg', 'doors' => 2, 'color' => 'Gris', 'power' => 585, 'seats' => 2],
            ['brand' => 7, 'type' => 1, 'model' => 'C63', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 300.00, 'description' => 'Berline sportive hybride.', 'photo' => 'mercedes-c63.jpg', 'doors' => 4, 'color' => 'Noir', 'power' => 680, 'seats' => 5],
            ['brand' => 7, 'type' => 2, 'model' => 'G63', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 400.00, 'description' => 'SUV iconique haute performance.', 'photo' => 'mercedes-g63.jpg', 'doors' => 5, 'color' => 'Noir', 'power' => 585, 'seats' => 5],
            ['brand' => 7, 'type' => 2, 'model' => 'GLE', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Diesel', 'price' => 200.00, 'description' => 'SUV luxueux et confortable.', 'photo' => 'mercedes-gle.jpg', 'doors' => 5, 'color' => 'Gris', 'power' => 330, 'seats' => 5],
            ['brand' => 7, 'type' => 4, 'model' => 'GT Black', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 600.00, 'description' => 'Version extrême de l\'AMG GT.', 'photo' => 'mercedes-gt-black.jpg', 'doors' => 2, 'color' => 'Noir', 'power' => 730, 'seats' => 2],
            ['brand' => 7, 'type' => 3, 'model' => 'SL', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 400.00, 'description' => 'Cabriolet luxueux et sportif.', 'photo' => 'mercedes-sl.jpg', 'doors' => 2, 'color' => 'Rouge', 'power' => 585, 'seats' => 2],
            
            // Peugeot
            ['brand' => 8, 'type' => 6, 'model' => '208', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 80.00, 'description' => 'Citadine moderne et agile.', 'photo' => 'peugeot-208.jpg', 'doors' => 5, 'color' => 'Bleu', 'power' => 130, 'seats' => 5],
            ['brand' => 8, 'type' => 2, 'model' => '3008', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 120.00, 'description' => 'SUV familial innovant.', 'photo' => 'peugeot-3008.jpg', 'doors' => 5, 'color' => 'Gris', 'power' => 225, 'seats' => 5],
            ['brand' => 8, 'type' => 1, 'model' => '508', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 150.00, 'description' => 'Berline élégante et technologique.', 'photo' => 'peugeot-508.jpg', 'doors' => 4, 'color' => 'Rouge', 'power' => 225, 'seats' => 5],
            
            // Porsche
            ['brand' => 9, 'type' => 4, 'model' => '911', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 500.00, 'description' => 'Voiture de sport iconique.', 'photo' => 'porsche-911.jpg', 'doors' => 2, 'color' => 'Gris', 'power' => 450, 'seats' => 4],
            ['brand' => 9, 'type' => 2, 'model' => 'Cayenne', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 300.00, 'description' => 'SUV sportif de luxe.', 'photo' => 'porsche-cayenne.jpg', 'doors' => 5, 'color' => 'Noir', 'power' => 462, 'seats' => 5],
            ['brand' => 9, 'type' => 4, 'model' => 'GT3 RS', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 700.00, 'description' => 'Version radicale de la 911.', 'photo' => 'porsche-gt3rs.jpg', 'doors' => 2, 'color' => 'Vert', 'power' => 525, 'seats' => 2],
            ['brand' => 9, 'type' => 1, 'model' => 'Taycan', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Électrique', 'price' => 400.00, 'description' => 'Berline électrique sportive.', 'photo' => 'porsche-taycan.jpg', 'doors' => 4, 'color' => 'Blanc', 'power' => 625, 'seats' => 4],
            
            // Renault
            ['brand' => 10, 'type' => 2, 'model' => 'Captur', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 80.00, 'description' => 'SUV urbain pratique.', 'photo' => 'renault-captur.jpg', 'doors' => 5, 'color' => 'Orange', 'power' => 140, 'seats' => 5],
            ['brand' => 10, 'type' => 6, 'model' => 'Megane RS', 'year' => 2024, 'transmission' => 'Manuelle', 'energy' => 'Essence', 'price' => 150.00, 'description' => 'Compacte sportive radicale.', 'photo' => 'renault-megane-rs.jpg', 'doors' => 5, 'color' => 'Jaune', 'power' => 300, 'seats' => 5],
            ['brand' => 10, 'type' => 1, 'model' => 'Talisman', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Diesel', 'price' => 120.00, 'description' => 'Berline confortable et élégante.', 'photo' => 'renault-talisman.jpg', 'doors' => 4, 'color' => 'Gris', 'power' => 190, 'seats' => 5],
            
            // Tesla
            ['brand' => 11, 'type' => 1, 'model' => 'Model 3', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Électrique', 'price' => 200.00, 'description' => 'Berline électrique performante.', 'photo' => 'tesla-model-3.jpg', 'doors' => 4, 'color' => 'Blanc', 'power' => 513, 'seats' => 5],
            ['brand' => 11, 'type' => 1, 'model' => 'Model S', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Électrique', 'price' => 300.00, 'description' => 'Berline électrique haut de gamme.', 'photo' => 'tesla-model-s.jpg', 'doors' => 4, 'color' => 'Rouge', 'power' => 1020, 'seats' => 5],
            ['brand' => 11, 'type' => 2, 'model' => 'Model X', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Électrique', 'price' => 350.00, 'description' => 'SUV électrique avec portes papillon.', 'photo' => 'tesla-model-x.jpg', 'doors' => 5, 'color' => 'Blanc', 'power' => 1020, 'seats' => 7],
            
            // Toyota
            ['brand' => 12, 'type' => 1, 'model' => 'Camry', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 120.00, 'description' => 'Berline hybride confortable.', 'photo' => 'toyota-camry.jpg', 'doors' => 4, 'color' => 'Gris', 'power' => 218, 'seats' => 5],
            ['brand' => 12, 'type' => 6, 'model' => 'GR Yaris', 'year' => 2024, 'transmission' => 'Manuelle', 'energy' => 'Essence', 'price' => 150.00, 'description' => 'Citadine sportive radicale.', 'photo' => 'toyota-gryaris.jpg', 'doors' => 3, 'color' => 'Blanc', 'power' => 261, 'seats' => 4],
            ['brand' => 12, 'type' => 2, 'model' => 'Land Cruiser', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Diesel', 'price' => 200.00, 'description' => 'SUV robuste et luxueux.', 'photo' => 'toyota-landcruiser.jpg', 'doors' => 5, 'color' => 'Noir', 'power' => 330, 'seats' => 7],
            ['brand' => 12, 'type' => 2, 'model' => 'RAV4', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Hybride', 'price' => 130.00, 'description' => 'SUV hybride polyvalent.', 'photo' => 'toyota-rav4.jpg', 'doors' => 5, 'color' => 'Bleu', 'power' => 222, 'seats' => 5],
            ['brand' => 12, 'type' => 4, 'model' => 'Supra', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 300.00, 'description' => 'Coupé sport légendaire.', 'photo' => 'toyota-supra.jpg', 'doors' => 2, 'color' => 'Jaune', 'power' => 340, 'seats' => 2],
            
            // Volkswagen
            ['brand' => 13, 'type' => 1, 'model' => 'Arteon', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 150.00, 'description' => 'Berline fastback élégante.', 'photo' => 'vw-arteon.jpg', 'doors' => 5, 'color' => 'Gris', 'power' => 280, 'seats' => 5],
            ['brand' => 13, 'type' => 6, 'model' => 'Golf GTI', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Essence', 'price' => 150.00, 'description' => 'Compacte sportive iconique.', 'photo' => 'vw-golf-gti.jpg', 'doors' => 5, 'color' => 'Rouge', 'power' => 245, 'seats' => 5],
            ['brand' => 13, 'type' => 2, 'model' => 'Tiguan', 'year' => 2024, 'transmission' => 'Automatique', 'energy' => 'Diesel', 'price' => 130.00, 'description' => 'SUV compact polyvalent.', 'photo' => 'vw-tiguan.jpg', 'doors' => 5, 'color' => 'Blanc', 'power' => 150, 'seats' => 5],
        ];

        $brandRepo = $this->entityManager->getRepository(Brand::class);
        $typeRepo = $this->entityManager->getRepository(VehicleType::class);
        $statusRepo = $this->entityManager->getRepository(Status::class);

        $count = 0;
        foreach ($cars as $carData) {
            // Check if car already exists
            $existingCar = $this->entityManager->getRepository(Car::class)->findOneBy([
                'model' => $carData['model'],
                'brand' => $brandRepo->find($carData['brand'])
            ]);

            if (!$existingCar) {
                $car = new Car();
                $car->setModel($carData['model']);
                $car->setBrand($brandRepo->find($carData['brand']));
                $car->setType($typeRepo->find($carData['type']));
                $car->setStatus($statusRepo->find('disponible'));
                $car->setYear($carData['year']);
                $car->setTransmission($carData['transmission']);
                $car->setEnergy($carData['energy']);
                $car->setRentalPrice((string)$carData['price']);
                $car->setDescription($carData['description']);
                $car->setPhoto($carData['photo']);
                $car->setDoors($carData['doors']);
                $car->setColor($carData['color']);
                $car->setPower($carData['power']);
                $car->setSeats($carData['seats']);

                $this->entityManager->persist($car);
                $count++;
            }
        }

        $this->entityManager->flush();

        $io->success(sprintf('%d cars have been imported successfully!', $count));

        return Command::SUCCESS;
    }
} 