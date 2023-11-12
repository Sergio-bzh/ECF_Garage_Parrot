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

        $limitedTestimonials = $testimonialsRepo->findBy([], ['content' => 'ASC'], 4 );
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
        if (empty($testimonialList))
        {
            $this->testimonials[] = 'Il n\'y a pas de commentaire pour l\'instant';
        } else {
            $this->testimonials = $testimonialList;
        }

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
        if (empty($limitedList))
        {
            $this->limitedTestimonials[] = 'Il n\'y a pas de commentaire pour l\'instant (donc pas de filtre)';
        } else {
            $this->limitedTestimonials = $limitedList;
        }
    }
}
