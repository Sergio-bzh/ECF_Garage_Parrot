<?php

namespace App\Service;

use App\Entity\Testimonial;
use Doctrine\ORM\EntityManagerInterface;

class TestimonialService
{
    private array $testimonials;

    public function getTestimonials(): array
    {
        return $this->testimonials;
    }

    public function __Construct(EntityManagerInterface $entityManager)
    {
        $testimonialsRepo = $entityManager->getRepository(Testimonial::class);
        $extractedTestimonials = $testimonialsRepo->findAll();

        $testimonialList = [];

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
    }
}