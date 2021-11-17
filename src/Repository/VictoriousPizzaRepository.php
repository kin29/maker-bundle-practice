<?php

namespace App\Repository;

use App\Entity\VictoriousPizza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VictoriousPizza|null find($id, $lockMode = null, $lockVersion = null)
 * @method VictoriousPizza|null findOneBy(array $criteria, array $orderBy = null)
 * @method VictoriousPizza[]    findAll()
 * @method VictoriousPizza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VictoriousPizzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VictoriousPizza::class);
    }

    // /**
    //  * @return VictoriousPizza[] Returns an array of VictoriousPizza objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VictoriousPizza
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
