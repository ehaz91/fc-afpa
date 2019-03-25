<?php

namespace App\Repository;

use App\Entity\Billetterie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Billetterie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Billetterie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Billetterie[]    findAll()
 * @method Billetterie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BilleterieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Billetterie::class);
    }

    // /**
    //  * @return Billetterie[] Returns an array of Billetterie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Billetterie
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
