<?php

namespace App\Repository;

use App\Entity\JoueurMois;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JoueurMois|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoueurMois|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoueurMois[]    findAll()
 * @method JoueurMois[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoueurMoisRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JoueurMois::class);
    }

    // /**
    //  * @return JoueurMois[] Returns an array of JoueurMois objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JoueurMois
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
