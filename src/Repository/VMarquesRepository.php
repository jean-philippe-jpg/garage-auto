<?php

namespace App\Repository;

use App\Entity\VMarques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VMarques>
 *
 * @method VMarques|null find($id, $lockMode = null, $lockVersion = null)
 * @method VMarques|null findOneBy(array $criteria, array $orderBy = null)
 * @method VMarques[]    findAll()
 * @method VMarques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VMarquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VMarques::class);
    }

//    /**
//     * @return VMarques[] Returns an array of VMarques objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VMarques
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
