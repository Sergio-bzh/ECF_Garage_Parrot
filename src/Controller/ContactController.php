<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Service\ScheduleService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact', methods: 'GET|POST')]
    public function index(ScheduleService $displaySchedules, Request $request, EntityManagerInterface $entityManager): Response
    {
        $annonce = $request->query->get('Annonce');

        // J'instancie un nouvel objet contact
        $contact = new Contact();

        // Je vérifie si Annonce existe et l'affecte au champs Subject du formulaire
        if ($annonce) {
           $contact->setSubject($annonce);
        }

        // Je crée le formulaire
        $contactForm = $this->createForm(ContactFormType::class, $contact);

        // Je gère la requête du formulaire
        $contactForm->handleRequest($request);

        // Je vérifie la soumission et la validité du formulaire
        if ($contactForm->isSubmitted() && $contactForm->isValid())
        {
            // J'envoie l'objet contact en BDD
            $entityManager->persist($contact);
            $entityManager->flush();

            // Je redirige le client à la page d'accueil
            return $this->redirectToRoute('app_home');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'contactForm' => $contactForm->createView(),
            'displaySchedules' => $displaySchedules->getDisplaySchedules()
        ]);
    }
}
