<?php

namespace App\Repository;

use App\Entity\VModeles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VModeles>
 *
 * @method VModeles|null find($id, $lockMode = null, $lockVersion = null)
 * @method VModeles|null findOneBy(array $criteria, array $orderBy = null)
 * @method VModeles[]    findAll()
 * @method VModeles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VModelesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VModeles::class);
    }

//    /**
//     * @return VModeles[] Returns an array of VModeles objects
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

//    public function findOneBySomeField($value): ?VModeles
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
