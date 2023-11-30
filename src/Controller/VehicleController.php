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
use Symfony\Component\HttpFoundation\Request;
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
    public function show_vehicle(Request $request, ScheduleService $scheduleService, Vehicle $vehicle, ImageRepository $imageRepo): Response
    {
//        $vehicle->getId();
        $images = $imageRepo->findByVehicleId($vehicle);

        return $this->render('vehicle/show_vehicle.html.twig', [
            'controller_name' => 'VehicleController',
//            compact('vehicle'),
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
            'controller_name' => 'app_select_vehicle',
            'vehicle' => $vehicle,
            'subject' => $contact,
            'contactForm' => $contactForm->createView(),
            'displayShedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }

}
