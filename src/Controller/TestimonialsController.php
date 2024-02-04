<?php

namespace App\Controller;

use App\Entity\Testimonial;
use App\Form\TestimonialFormType;
use App\Repository\TestimonialRepository;
use App\Service\ScheduleService;
use App\Service\TestimonialService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestimonialsController extends AbstractController
{
    #[Route('/commentaires/{page}', name: 'app_comments')]
    public function comments(ScheduleService $displaySchedules, TestimonialService $testimonialService, $page = 1, $limit = 6): Response
    {
        return $this->render('testimonials/index.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules(),
            'testimonials' => $testimonialService->getTestimonials($page, $limit),
        ]);
    }

    #[
        Route('/add_testimonial', name:'app_add_testimonial', methods: 'GET|POST'),
        Route('/ajouter_temoignage', name:'app_add_temoignage', methods: 'GET|POST'),
        Route('/ajouter_commentaire', name:'app_add_comment', methods: 'GET|POST')
    ]
    public function add_testimonial(ScheduleService $displaySchedules,Request $request, EntityManagerInterface $entityManager):Response
    {
        // Je crée un nouveau commentaire
        $comment = new Testimonial();

        // Je crée le formulaire pour le commentaire
        $commentForm = $this->createForm(TestimonialFormType::class, $comment);

        // Je traite la requête du formulaire
        $commentForm->handleRequest($request);

        // Je vérifie la soumission et la validité du formulaire
        if($commentForm->isSubmitted() and $commentForm->isValid())
        {
            // J'enregistre le commentaire en BDD
            $entityManager->persist($comment);
            $entityManager->flush();

            // J'ajoute un message flash de confirmation pour le client
            $this->addFlash('success', 'Votre commentaire a bien été soumis et sera affiché après traitement par nos modérateurs');

            // Je redigige vers la page d'accueil
            return $this->redirectToRoute('app_home');
        }

        return $this->render('testimonials/add.html.twig', [
            'commentForm' => $commentForm->createView(),
            'controller_name' => 'SuperTuxController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules(),
        ]);
    }
}
