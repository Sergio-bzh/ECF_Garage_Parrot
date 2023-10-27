<?php

namespace App\Repository;

use App\Entity\Scheldule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Scheldule>
 *
 * @method Scheldule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scheldule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scheldule[]    findAll()
 * @method Scheldule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchelduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scheldule::class);
    }

//    /**
//     * @return Scheldule[] Returns an array of Scheldule objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Scheldule
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
