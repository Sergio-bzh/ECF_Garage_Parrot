<?php

namespace App\Repository;

use App\Entity\Image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Image>
 *
 * @method Image|null find($id, $lockMode = null, $lockVersion = null)
 * @method Image|null findOneBy(array $criteria, array $orderBy = null)
 * @method Image[]    findAll()
 * @method Image[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Image::class);
    }

    // Retourne un tableau d'objets Image selon l'id du véhicule concerné
    public function findByVehicleId($vehicleId): array
    {
        return $this->createQueryBuilder('image')
            ->where('image.vehicle = :id')
            ->setParameter('id', $vehicleId)
            ->orderBy('image.id','ASC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }

/*
    // La même requête codée différemment
    public function findByVehicleIdBis($vehicleId): array
    {
        $queryBuilder = $this->createQueryBuilder('image');
            $queryBuilder
                ->where('image.vehicle = :id')
                ->setParameter('id', $vehicleId)
                ->orderBy('image.id','ASC')
            ->setMaxResults(5);
        $query = $queryBuilder->getQuery();
            return $query->getResult();
    }
*/


//    /**
//     * @return Image[] Returns an array of Image objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Image
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
