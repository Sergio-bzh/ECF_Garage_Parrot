<?php

namespace App\Repository;

use App\Entity\Vehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @extends ServiceEntityRepository<Vehicle>
 *
 * @method Vehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicle[]    findAll()
 * @method Vehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

// Je me suis inspiré de la fonction de recherche que j'ai faite dans le "TestimonialRepository"
    public function findVehiclesPaginated(int $page, int $limit): array
    {
        $limit = abs($limit);

        $result = [];

        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('vehicles')
            ->from('App\Entity\Vehicle', 'vehicles')
            ->setMaxResults($limit)
            ->setFirstResult($page * $limit - $limit);

        $paginator = new Paginator($query);
        $data = $paginator->getQuery()->getResult();
//      Je vérifie si la variable $data est vide et si oui, je retourne le tableau
        if(empty($data))
        {
            $result['data'] = [];
            $result['pages'] = [];
            $result['page'] = null ;
            return $result;
        }
// Je déclare une variable ($pages) pour stocker le nombre des pages de commentaires présents en BDD
        $pages = ceil($paginator->count() / $limit);

        $result['data']     = $data;
        $result['pages']    = $pages;
        $result['page']     = $page;
        $result['limit']    = $limit;

        return $result;
    }

// J'ai créé cette fonction pour gérer les appel AJAX
    public function findFiltredVehicles(int $minKm = null, int $maxKm = null, int $minPrice = null, int $maxPrice = null, int $minYear = null, int $maxYear = null): ?array
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('filtredVehicles')
            ->from('App\Entity\Vehicle', 'filtredVehicles');
        if($minKm || $maxKm || $minPrice || $maxPrice || $minYear || $maxYear){
            $query->andWhere('filtredVehicles.kilometers >= :minKm')
                ->setParameter('minKm', $minKm);
            $query->andWhere('filtredVehicles.kilometers <= :maxKm')
                ->setParameter('maxKm', $maxKm);
            $query->andWhere('filtredVehicles.price >= :minPrice')
                ->setParameter('minPrice', $minPrice);
            $query->andWhere('filtredVehicles.price <= :maxPrice')
                ->setParameter('maxPrice', $maxPrice);
            $query->andWhere('filtredVehicles.registration_date >= :minYear')
                ->setParameter('minYear', $minYear.'-01-01');
            $query->andWhere('filtredVehicles.registration_date <= :maxYear')
                ->setParameter('maxYear', $maxYear.'-12-31');
        }
        return $query->getQuery()->getResult();
    }

//    public function findMinMax(): ?array
//    {
//        $query = $this->getEntityManager()->createQueryBuilder()
//            ->select('min(vehicle.kilometers) as minKm, max(vehicle.kilometers) as maxKm')
//            ->from('Vehicle', 'vehicles')
//            ;
//        return $query->getQuery()->getResult();
//    }

//    /**
//     * @return Vehicle[] Returns an array of Vehicle objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vehicle
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
