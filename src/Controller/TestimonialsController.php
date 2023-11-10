<?php

namespace App\Controller;

use App\Service\ScheduleService;
use App\Service\TestimonialService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestimonialsController extends AbstractController
{
    #[
        Route('/testimonials', name: 'app_testimonials'),
        Route('/commentaires', name: 'app_comments')
    ]
    public function index(ScheduleService $displaySchedules, TestimonialService $testimonialService): Response
    {
        return $this->render('testimonials/index.html.twig', [
            'controller_name' => 'TestimonialsController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules(),
            'testimonials' => $testimonialService->getTestimonials(),
        ]);
    }
/*
    #[Route('/commentaires', name: 'app_comments')]
    public function comments(ScheduleService $displaySchedules, TestimonialService $testimonialService):Response
    {
        return $this->render('testimonials/index.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules(),
            'testimonials' => $testimonialService->getTestimonials(),
        ]);
    }
*/
}
