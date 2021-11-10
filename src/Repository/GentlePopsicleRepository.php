<?php

namespace App\Repository;

use App\Entity\GentlePopsicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GentlePopsicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method GentlePopsicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method GentlePopsicle[]    findAll()
 * @method GentlePopsicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GentlePopsicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GentlePopsicle::class);
    }

    // /**
    //  * @return GentlePopsicle[] Returns an array of GentlePopsicle objects
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
    public function findOneBySomeField($value): ?GentlePopsicle
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
