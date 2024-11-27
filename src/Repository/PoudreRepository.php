<?php

namespace App\Repository;

use App\Entity\Poudre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Poudre>
 *
 * @method Poudre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poudre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poudre[]    findAll()
 * @method Poudre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoudreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poudre::class);
    }

   /**
    * @return Poudre[] Returns an array of Poudre objects
    */
   public function listePoudre(): array
   {
       return $this->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.id', 'ASC')
            ->getQuery()
       ;
   }

//    public function findOneBySomeField($value): ?Poudre
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
