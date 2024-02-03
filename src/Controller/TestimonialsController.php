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
/*    #[
            Route('/testimonials', name: 'app_testimonials', methods: 'GET'),
            Route('/commentaires', name: 'app_comments', methods: 'GET')
    ]
    public function index(ScheduleService $displaySchedules, TestimonialService $testimonialService,
                          TestimonialRepository $testimonialRepository, Request $request): Response
    {


//      Je récupère le numéro de page dans l'URL et s'il n'y a pas de numéro de page dans l'URL je mets la première par défaut
        $page = $request->query->getInt('page', 1);

//      Je récupère tous les commentaires
        $commentsList = $testimonialRepository->findTestimonialsPaginated($page, 6);

//        dd($commentsList['data'][0]);

        return $this->render('testimonials/index.html.twig', [
            'controller_name' => 'TestimonialsController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules(),
//            'testimonials' => $testimonialService->getTestimonials(),
            'testimonials' => $commentsList['data']
        ]);
    }
*/
    #[Route('/commentaires/{page}', name: 'app_comments')]
    public function comments(ScheduleService $displaySchedules, TestimonialService $testimonialService, int $page): Response
    {
        return $this->render('testimonials/index.html.twig', [
            'controller_name' => 'HomeController',
            'displaySchedules' => $displaySchedules->getDisplaySchedules(),
            'testimonials' => $testimonialService->getTestimonials($page, 6)['data'],
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
