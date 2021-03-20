<?php

namespace App\Repository;

use App\Entity\Dedier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dedier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dedier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dedier[]    findAll()
 * @method Dedier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DedierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dedier::class);
    }

    // /**
    //  * @return Dedier[] Returns an array of Dedier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dedier
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
