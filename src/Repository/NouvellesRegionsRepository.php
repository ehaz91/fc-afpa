<?php

namespace App\Repository;

use App\Entity\NouvellesRegions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NouvellesRegions|null find($id, $lockMode = null, $lockVersion = null)
 * @method NouvellesRegions|null findOneBy(array $criteria, array $orderBy = null)
 * @method NouvellesRegions[]    findAll()
 * @method NouvellesRegions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NouvellesRegionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NouvellesRegions::class);
    }

    // /**
    //  * @return NouvellesRegions[] Returns an array of NouvellesRegions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NouvellesRegions
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
