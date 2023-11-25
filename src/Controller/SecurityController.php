<?php

namespace App\Controller;

use App\Service\ScheduleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[
        Route(path: '/login', name: 'app_login'),
//        Route(path: '/connexion', name: 'app_connection')
    ]
    public function login(AuthenticationUtils $authenticationUtils, ScheduleService $scheduleService): Response
    {
        $displaySchedules =  $scheduleService->getDisplaySchedules();

         if ($this->getUser()) {
             return $this->redirectToRoute('admin');
         }

//        // dd($scheduleService);

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'displaySchedules' => $displaySchedules,
            'last_username' => $lastUsername,
            'error' => $error]);
    }

    #[
        Route(path: '/logout', name: 'app_logout'),
//        Route(path: '/deconnexion', name: 'app_deconnexion')
    ]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
