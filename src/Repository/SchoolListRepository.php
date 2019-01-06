<?php

namespace App\Repository;

use App\Entity\SchoolList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SchoolList|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchoolList|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchoolList[]    findAll()
 * @method SchoolList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolListRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SchoolList::class);
    }

    // /**
    //  * @return SchoolList[] Returns an array of SchoolList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SchoolList
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
