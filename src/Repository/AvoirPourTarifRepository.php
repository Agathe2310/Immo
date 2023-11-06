<?php

namespace App\Repository;

use App\Entity\AvoirPourTarif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvoirPourTarif>
 *
 * @method AvoirPourTarif|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvoirPourTarif|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvoirPourTarif[]    findAll()
 * @method AvoirPourTarif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvoirPourTarifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvoirPourTarif::class);
    }

//    /**
//     * @return AvoirPourTarif[] Returns an array of AvoirPourTarif objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AvoirPourTarif
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
