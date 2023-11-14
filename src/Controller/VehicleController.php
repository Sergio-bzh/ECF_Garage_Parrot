<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Repository\VehicleRepository;
use App\Service\ScheduleService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    #[Route('/vehicles', name: 'app_vehicles_list', methods: 'GET')]
    public function index(ScheduleService $scheduleService, VehicleRepository $vehicleRepository): Response
    {
        $vehicle_list = $vehicleRepository->findBy([], ['id' => 'DESC']);

        return $this->render('vehicle/index.html.twig', [
            'controller_name' => 'VehicleController',
            'vehicle_list' => $vehicle_list,
            'displaySchedules' => $scheduleService->getDisplaySchedules(),
        ]);
    }



    #[Route('/vehicles/{id<[0-9]+>}', name: 'app_show_vehicle', methods: 'GET')]
    public function show_vehicle(ScheduleService $scheduleService, Vehicle $vehicle): Response
    {
        return $this->render('vehicle/show_vehicle.html.twig', [
            'controller_name' => 'VehicleController',
//            compact('vehicle'),
            'vehicle' => $vehicle,
            'displaySchedules' => $scheduleService->getDisplaySchedules(),
        ]);
    }
}
