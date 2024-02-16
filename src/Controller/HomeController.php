<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use App\Service\ScheduleService;
use App\Service\TestimonialService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[
        Route('/', name: 'app_home', methods: 'GET'),
        Route('/home', name: 'app_home_alt', methods: 'GET'),
        Route('/accueil', name: 'app_accueil', methods: 'GET')
    ]
    public function index(ScheduleService $displaySchedules, TestimonialService $testimonialService, ServiceRepository $repo): Response
    {
        $service_list = $repo->findBy([], ['id' => 'ASC'], 3);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules(),
            'testimonials' => $testimonialService->getLimitedTestimonials(),
            'service_list' => $service_list,
        ]);
    }
}
