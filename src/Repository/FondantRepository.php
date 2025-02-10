<?php

namespace App\Repository;

use App\Entity\Fondant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fondant>
 *
 * @method Fondant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fondant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fondant[]    findAll()
 * @method Fondant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FondantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fondant::class);
    }

//    /**
//     * @return Fondant[] Returns an array of Fondant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Fondant
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
