<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Status;
use App\Entity\VehicleType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create vehicle types
        $types = [
            'Berline',
            'SUV',
            'Coupé',
            'Cabriolet',
            'Break',
            'Monospace'
        ];

        foreach ($types as $typeName) {
            $type = new VehicleType();
            $type->setName($typeName);
            $manager->persist($type);
        }

        // Create statuses
        $statuses = [
            'Disponible',
            'En location',
            'En maintenance',
            'Vendu'
        ];

        foreach ($statuses as $statusName) {
            $status = new Status();
            $status->setId(strtolower(str_replace(' ', '_', $statusName)));
            $status->setType($statusName);
            $manager->persist($status);
        }

        // Create brands
        $brands = [
            [
                'name' => 'Tesla',
                'logo' => 'tesla.png',
                'description' => 'Fabricant américain de véhicules électriques'
            ],
            [
                'name' => 'Toyota',
                'logo' => 'toyota.png',
                'description' => 'Constructeur automobile japonais'
            ],
            [
                'name' => 'Ford',
                'logo' => 'ford.png',
                'description' => 'Constructeur automobile américain'
            ]
        ];

        foreach ($brands as $brandData) {
            $brand = new Brand();
            $brand->setName($brandData['name']);
            $brand->setLogo($brandData['logo']);
            $brand->setDescription($brandData['description']);
            $manager->persist($brand);
        }

        $manager->flush();
    }
}
