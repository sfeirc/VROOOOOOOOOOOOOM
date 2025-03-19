<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Brand;
use App\Entity\Status;
use App\Entity\VehicleType;
use App\Repository\CarRepository;
use App\Repository\BrandRepository;
use App\Repository\StatusRepository;
use App\Repository\VehicleTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin_index')]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }

    #[Route('/car/new', name: 'app_admin_car_new')]
    public function new(Request $request, EntityManagerInterface $entityManager, BrandRepository $brandRepository, StatusRepository $statusRepository, VehicleTypeRepository $typeRepository): Response
    {
        if ($request->isMethod('POST')) {
            $car = new Car();
            $car->setModel($request->request->get('model'));
            $car->setDoors($request->request->get('doors'));
            $car->setTransmission($request->request->get('transmission'));
            $car->setYear($request->request->get('year'));
            $car->setColor($request->request->get('color'));
            $car->setPhoto($request->request->get('photo'));
            $car->setAdditionalPhotos(json_decode($request->request->get('additional_photos', '[]')));
            $car->setEnergy($request->request->get('energy'));
            $car->setPower($request->request->get('power'));
            $car->setRentalPrice($request->request->get('rental_price'));
            $car->setDescription($request->request->get('description'));
            $car->setSeats($request->request->get('seats'));
            $car->setStatus($statusRepository->find($request->request->get('status_id')));
            $car->setBrand($brandRepository->find($request->request->get('brand_id')));
            $car->setType($typeRepository->find($request->request->get('type_id')));

            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_index');
        }

        return $this->render('admin/car/new.html.twig', [
            'brands' => $brandRepository->findAll(),
            'statuses' => $statusRepository->findAll(),
            'types' => $typeRepository->findAll(),
        ]);
    }

    #[Route('/car/{id}/edit', name: 'app_admin_car_edit')]
    public function edit(Request $request, Car $car, EntityManagerInterface $entityManager, BrandRepository $brandRepository, StatusRepository $statusRepository, VehicleTypeRepository $typeRepository): Response
    {
        if ($request->isMethod('POST')) {
            $car->setModel($request->request->get('model'));
            $car->setDoors($request->request->get('doors'));
            $car->setTransmission($request->request->get('transmission'));
            $car->setYear($request->request->get('year'));
            $car->setColor($request->request->get('color'));
            $car->setPhoto($request->request->get('photo'));
            $car->setAdditionalPhotos(json_decode($request->request->get('additional_photos', '[]')));
            $car->setEnergy($request->request->get('energy'));
            $car->setPower($request->request->get('power'));
            $car->setRentalPrice($request->request->get('rental_price'));
            $car->setDescription($request->request->get('description'));
            $car->setSeats($request->request->get('seats'));
            $car->setStatus($statusRepository->find($request->request->get('status_id')));
            $car->setBrand($brandRepository->find($request->request->get('brand_id')));
            $car->setType($typeRepository->find($request->request->get('type_id')));

            $entityManager->flush();

            return $this->redirectToRoute('app_admin_index');
        }

        return $this->render('admin/car/edit.html.twig', [
            'car' => $car,
            'brands' => $brandRepository->findAll(),
            'statuses' => $statusRepository->findAll(),
            'types' => $typeRepository->findAll(),
        ]);
    }

    #[Route('/car/{id}/delete', name: 'app_admin_car_delete')]
    public function delete(Car $car, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($car);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_index');
    }
} 