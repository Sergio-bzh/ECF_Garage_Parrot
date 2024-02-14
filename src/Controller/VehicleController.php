<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Vehicle;
use App\Form\ContactFormType;
use App\Repository\ImageRepository;
use App\Repository\VehicleRepository;
use App\Service\ScheduleService;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    #[Route('/vehicles/{page}', name: 'app_vehicles_list', methods: 'GET')]
    public function index(ScheduleService $scheduleService, VehicleRepository $vehicleRepository, $page = 1): Response
    {
        $limit = 6;
        $vehicle_list = $vehicleRepository->findBy([], ['id' => 'ASC']);
        $vehicle_paginated = $vehicleRepository->findVehiclesPaginated($page, $limit);
//        $bornes = $vehicleRepository->findMinMax();

        return $this->render('vehicle/index.html.twig', [
            'vehicle_list' => $vehicle_list,
            'vehicle_paginated' => $vehicle_paginated,
//            'bornes' => $bornes,
            'displaySchedules' => $scheduleService->getDisplaySchedules()
        ]);
    }

    #[Route('/vehicle/{id<[0-9]+>}', name: 'app_show_vehicle', methods: 'GET')]
    public function show_vehicle(Request $request, ScheduleService $scheduleService, Vehicle $vehicle, ImageRepository $imageRepo): Response
    {
        $images = $imageRepo->findByVehicleId($vehicle);

        return $this->render('vehicle/show_vehicle.html.twig', [
            'vehicle' => $vehicle,
            'image_list' => $images,
            'displaySchedules' => $scheduleService->getDisplaySchedules(),
        ]);
    }

    #[Route('/selectedVehicle', name: 'app_select_vehicle', methods: 'GET|POST')]
    public function selectVehicle(Request $request, ScheduleService $displaySchedules, Vehicle $vehicle, EntityManagerInterface $entityManager):Response
    {
        $vehicle = new Vehicle();
        $contact = new Contact();
        $contactForm = $this->createForm(ContactFormType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid())
        {
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('contact/index.html.twig',[
            'vehicle' => $vehicle,
            'subject' => $contact,
            'contactForm' => $contactForm->createView(),
            'displayShedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }

    #[Route('/filteredVehicle/{minKm}/{maxKm}/{minPrice}/{maxPrice}/{minYear}/{maxYear}', name: 'app_filtered', methods: 'GET')]
    public function filteredVehicle(int $minKm = null, int $maxKm = null, int $minPrice = null, int $maxPrice = null,
                                    int $minYear = null, int $maxYear = null, VehicleRepository $vehicleRepository): JsonResponse
    {
        // Que faire si valeur null ? ==> Définir des seuils
        $seuilMinKm = 10000;
        $seuilMaxKm = 120000;
        $seuilMinPrice = 2000;
        $seuilMaxPrice = 22000;
        $seuilMinYear = 2013;
        $seuilMaxYear = 2023;

        $minKm = is_null($minKm) || $minKm < $seuilMinKm ? $seuilMinKm : $minKm;
        $maxKm = is_null($maxKm) || $maxKm > $seuilMaxKm ? $seuilMaxKm : $maxKm;
        $minPrice = is_null($minPrice) || $minPrice < $seuilMinPrice ? $seuilMinPrice : $minPrice;
        $maxPrice = is_null($maxPrice) || $maxPrice > $seuilMaxPrice ? $seuilMaxPrice : $maxPrice;
        $minYear = is_null($minYear) || $minYear < $seuilMinYear ? $seuilMinYear : $minYear;
        $maxYear = is_null($maxYear) || $maxYear > $seuilMaxYear ? $seuilMaxYear : $maxYear;

        $vehicleList = $vehicleRepository->findFiltredVehicles($minKm, $maxKm, $minPrice, $maxPrice, $minYear, $maxYear);

        $arrayOfVehicles = [];
        foreach ($vehicleList as $vehicle) {

            $arrayOfVehicles[] = ['id' => $vehicle->getId(), 'nom' => $vehicle->getVehicleName(), 'image' => $vehicle->getImageName(),
                'price' => $vehicle->getPrice(), 'kilometers' => $vehicle->getKilometers(), 'year' => $vehicle->getRegistrationDate()];
        }
        return $this->json($arrayOfVehicles);
    }
}
