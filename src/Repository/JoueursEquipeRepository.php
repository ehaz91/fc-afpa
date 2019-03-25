<?php

namespace App\Repository;

use App\Entity\JoueursEquipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JoueursEquipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoueursEquipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoueursEquipe[]    findAll()
 * @method JoueursEquipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoueursEquipeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JoueursEquipe::class);
    }

    // /**
    //  * @return JoueursEquipe[] Returns an array of JoueursEquipe objects
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
    public function findOneBySomeField($value): ?JoueursEquipe
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
