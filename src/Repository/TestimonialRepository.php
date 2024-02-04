<?php

namespace App\Repository;

use App\Entity\Testimonial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Testimonial>
 *
 * @method Testimonial|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testimonial|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testimonial[]    findAll()
 * @method Testimonial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestimonialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testimonial::class);
    }

    public function findTestimonialsPaginated(int $page, int $limit): array
    {
        $limit = abs($limit);

        $result = [];

        $query= $this->getEntityManager()->createQueryBuilder()
            ->select('testimonials')
            ->from('App\Entity\Testimonial', 'testimonials')
            ->setMaxResults($limit)
            ->setFirstResult(($page * $limit) - $limit);

        $paginator = new Paginator($query);
        $data = $paginator->getQuery()->getResult();

//      Je vérifie si la variable $data est vide et si oui, je retourne le tableau (vide bien sûr)
        if(empty($data))
        {
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

//    /**
//     * @return Testimonial[] Returns an array of Testimonial objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Testimonial
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
