<?php

namespace App\Repository;

use App\Entity\DiffuseurVoiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiffuseurVoiture>
 *
 * @method DiffuseurVoiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiffuseurVoiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiffuseurVoiture[]    findAll()
 * @method DiffuseurVoiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiffuseurVoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiffuseurVoiture::class);
    }

    /**
     * @return DiffuseurVoiture[] Returns an array of DiffuseurVoiture objects
     */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->orderBy('d.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?DiffuseurVoiture
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
