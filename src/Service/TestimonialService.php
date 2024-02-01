<?php

namespace App\Service;

use App\Entity\Testimonial;
use Doctrine\ORM\EntityManagerInterface;

class TestimonialService
{
    private array $testimonials;
    private array $limitedTestimonials;

    public function getTestimonials(): array
    {
        return $this->testimonials;
    }

    public function getLimitedTestimonials(): array
    {
        return $this->limitedTestimonials;
    }

    public function __Construct(EntityManagerInterface $entityManager)
    {
        $testimonialsRepo = $entityManager->getRepository(Testimonial::class);
        $extractedTestimonials = $testimonialsRepo->findBy([], ['score' => 'DESC']);
        $testimonialList = [];


//      Je génère un nombre un nombre aléatoire servant de offset pour la page d'accueil
        $offset = rand(0, count($extractedTestimonials));
        $limitedTestimonials = $testimonialsRepo->findBy([], ['content' => 'ASC'], 3, $offset );
        $limitedList = array();

//      Génération de tous les temoignages
        foreach ($extractedTestimonials as $index => $testimonial)
        {
            if($testimonial->isIsApproved())
            {
//                $testimonialList[$index] = $testimonial->getUserName() .' - '. $testimonial->getContent() .' - '. $testimonial->getScore() .'/////';
                $testimonialData = [
                    'Nom' => $testimonial->getUserName(),
                    'Contenu' => $testimonial->getContent(),
                    'Note' => $testimonial->getScore()
                ];
                $testimonialList[] = $testimonialData;
            }
        }
        $this->testimonials = $testimonialList;

//      Génération des temoignages avec limite de 3
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
