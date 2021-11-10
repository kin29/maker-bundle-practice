<?php

namespace App\Repository;

use App\Entity\GentlePuppy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GentlePuppy|null find($id, $lockMode = null, $lockVersion = null)
 * @method GentlePuppy|null findOneBy(array $criteria, array $orderBy = null)
 * @method GentlePuppy[]    findAll()
 * @method GentlePuppy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GentlePuppyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GentlePuppy::class);
    }

    // /**
    //  * @return GentlePuppy[] Returns an array of GentlePuppy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GentlePuppy
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
