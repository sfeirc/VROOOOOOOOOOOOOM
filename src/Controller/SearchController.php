<?php

namespace App\Controller;

use App\Repository\CarRepository;
use App\Repository\BrandRepository;
use App\Repository\VehicleTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(
        Request $request,
        CarRepository $carRepository,
        BrandRepository $brandRepository,
        VehicleTypeRepository $typeRepository
    ): Response {
        $query = $request->query->get('q');
        $brands = $request->query->all('brand');
        $types = $request->query->all('type');
        $energies = $request->query->all('energy');
        $maxPrice = $request->query->get('price') ? (float) $request->query->get('price') : null;
        $yearMin = $request->query->get('year_min') ? (int) $request->query->get('year_min') : null;
        $yearMax = $request->query->get('year_max') ? (int) $request->query->get('year_max') : null;
        $transmissions = $request->query->all('transmission');
        $sort = $request->query->get('sort', 'price_asc');

        $cars = $carRepository->findByFilters(
            $query,
            $brands,
            $types,
            $energies,
            $maxPrice,
            $yearMin,
            $yearMax,
            $transmissions,
            $sort
        );

        return $this->render('search/index.html.twig', [
            'cars' => $cars,
            'brands' => $brandRepository->findAll(),
            'types' => $typeRepository->findAll(),
            'query' => $query,
            'selectedBrands' => $brands,
            'selectedTypes' => $types,
            'selectedEnergies' => $energies,
            'selectedPrice' => $maxPrice,
            'selectedYearMin' => $yearMin,
            'selectedYearMax' => $yearMax,
            'selectedTransmissions' => $transmissions,
            'selectedSort' => $sort,
        ]);
    }

    #[Route('/api/search/autocomplete', name: 'app_search_autocomplete')]
    public function autocomplete(Request $request, CarRepository $carRepository): Response
    {
        $query = $request->query->get('q');
        $cars = $carRepository->findBySearchQuery($query);

        $results = array_map(function ($car) {
            return [
                'id' => $car->getId(),
                'text' => $car->getBrand()->getName() . ' ' . $car->getModel(),
                'url' => $this->generateUrl('app_car_show', ['id' => $car->getId()]),
                'image' => '/assets/images/' . $car->getPhoto(),
                'year' => $car->getYear(),
                'price' => $car->getRentalPrice(),
            ];
        }, $cars);

        return $this->json($results);
    }
} 