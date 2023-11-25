<?php

namespace App\Service;

use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;

class ServicesService
{
    private array $services = [] ;

    public function getServices(): array
    {
        return $this->services;
    }

    public function __Construct(EntityManagerInterface $entityManager)
    {
        $serviceRepo = $entityManager->getRepository(Service::class);
        $extractedServices = $serviceRepo->findAll();

        $servicesList = array();

        foreach ($extractedServices as $service)
        {
            if ($service)
            {
                $serviceData = [
                    'Nom de l\'image' => $service->getImageName(),
                    'Appelation' => $service->getLabel(),
                    'Type' => $service->getType(),
                    'Description' => $service->getDescription(),
                ];
                $servicesList[] = $serviceData;
            }
        }
        $this->services = $servicesList;
    }
}