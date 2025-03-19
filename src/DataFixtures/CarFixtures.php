<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Car;
use App\Entity\Status;
use App\Entity\VehicleType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $cars = [
            [
                'model' => 'Model 3',
                'brand' => 'Tesla',
                'type' => 'Berline',
                'year' => 2023,
                'doors' => 4,
                'seats' => 5,
                'transmission' => 'Automatique',
                'color' => 'Rouge',
                'photo' => 'tesla-model-3.jpg',
                'additionalPhotos' => [],
                'energy' => 'Électrique',
                'power' => 283,
                'rentalPrice' => 89.99,
                'description' => 'La Tesla Model 3 est une berline électrique offrant des performances exceptionnelles et une autonomie impressionnante. Son design épuré et moderne en fait un véhicule très apprécié.',
                'status' => 'Disponible'
            ],
            [
                'model' => 'GR Yaris',
                'brand' => 'Toyota',
                'type' => 'Coupé',
                'year' => 2023,
                'doors' => 3,
                'seats' => 4,
                'transmission' => 'Manuelle',
                'color' => 'Blanc',
                'photo' => 'toyota-gryaris.jpg',
                'additionalPhotos' => [],
                'energy' => 'Essence',
                'power' => 261,
                'rentalPrice' => 79.99,
                'description' => 'La Toyota GR Yaris est une version sportive et performante de la Yaris, développée par Gazoo Racing. Elle offre une expérience de conduite dynamique et engageante.',
                'status' => 'Disponible'
            ],
            [
                'model' => 'Mustang GT',
                'brand' => 'Ford',
                'type' => 'Coupé',
                'year' => 2023,
                'doors' => 2,
                'seats' => 4,
                'transmission' => 'Automatique',
                'color' => 'Noir',
                'photo' => 'ford-mustang.jpg',
                'additionalPhotos' => [],
                'energy' => 'Essence',
                'power' => 450,
                'rentalPrice' => 129.99,
                'description' => 'La Ford Mustang GT est une icône américaine offrant des performances impressionnantes avec son moteur V8. Son design agressif et son son caractéristique en font une voiture de légende.',
                'status' => 'Disponible'
            ]
        ];

        foreach ($cars as $carData) {
            $car = new Car();
            $car->setModel($carData['model']);
            $car->setBrand($manager->getRepository(Brand::class)->findOneBy(['name' => $carData['brand']]));
            $car->setType($manager->getRepository(VehicleType::class)->findOneBy(['name' => $carData['type']]));
            $car->setYear($carData['year']);
            $car->setDoors($carData['doors']);
            $car->setSeats($carData['seats']);
            $car->setTransmission($carData['transmission']);
            $car->setColor($carData['color']);
            $car->setPhoto($carData['photo']);
            $car->setAdditionalPhotos($carData['additionalPhotos']);
            $car->setEnergy($carData['energy']);
            $car->setPower($carData['power']);
            $car->setRentalPrice($carData['rentalPrice']);
            $car->setDescription($carData['description']);
            $car->setStatus($manager->getRepository(Status::class)->findOneBy(['type' => $carData['status']]));

            $manager->persist($car);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AppFixtures::class,
        ];
    }
}
