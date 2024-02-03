<?php

namespace App\Service;

use App\Entity\Testimonial;
use App\Repository\TestimonialRepository;
use Doctrine\ORM\EntityManagerInterface;

class TestimonialService
{
    private array $testimonials;
    private array $limitedTestimonials;
    private TestimonialRepository $testimonialRepo;

    public function getTestimonials($page, $limit): array
    {
        return $this->testimonialRepo->findTestimonialsPaginated($page, $limit);
    }

    public function getLimitedTestimonials(): array
    {
        return $this->limitedTestimonials;
    }

    public function __Construct(EntityManagerInterface $entityManager, TestimonialRepository $testimonialRepo)
    {
        $this->testimonialRepo = $testimonialRepo;
        $testimonialsRepo = $entityManager->getRepository(Testimonial::class);
        $extractedTestimonials = $testimonialsRepo->findBy([], ['score' => 'DESC']);
        $testimonialList = [];

//      Je génère un nombre un nombre aléatoire servant de offset pour la page d'accueil
        $offset = rand(0, count($extractedTestimonials));
        $limitedTestimonials = $testimonialsRepo->findBy([], ['content' => 'ASC'], 3, $offset );
        $limitedList = array();


//      Génération des temoignages avec limite de 3 pour la page d'accueil
        foreach ($limitedTestimonials as $testimonial)
        {
            if ($testimonial->isIsApproved())
            {
                $testimonialData = [
                    'Nom' => $testimonial->getUserName(),
                    'Contenu' => $testimonial->getContent(),
                    'Note' => $testimonial->getScore()
                ];
                $limitedList[] = $testimonialData;
            }
        }
        $this->limitedTestimonials = $limitedList;
    }
}
