<?php

namespace App\Controller;

use App\Service\ScheduleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[
        Route('/', name: 'app_home'),
        Route('/home', name: 'app_home_alt'),
        Route('/accueil', name: 'app_accueil')
    ]
    public function index(ScheduleService $displaySchedules): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }

    #[ROUTE('/vehicules', name: 'app_vehicles_list')]
    public function vehicles(ScheduleService $displaySchedules):Response
    {
        return $this->render('layout/vehicles.html.twig', [
           'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }

    #[Route('/commentaires', name: 'app_comments')]
    public function comments(ScheduleService $displaySchedules):Response
    {
        return $this->render('layout/comments.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }

    #[Route('/form_commentaires', name: 'app_comments_form')]
    public function leaveComment(ScheduleService $displaySchedules):Response
    {
        return $this->render('layout/form_comments.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contactRequest(ScheduleService $displaySchedules): Response
    {
        return $this->render('layout/contact_form.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }

    #[Route('/connexion', name: 'app_connection')]
    public function connection(ScheduleService $displaySchedules): Response
    {
        return $this->render('layout/connection_form.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }
}
