<?php

namespace App\Repository;

use App\Entity\Motorisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Motorisation>
 *
 * @method Motorisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Motorisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Motorisation[]    findAll()
 * @method Motorisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MotorisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Motorisation::class);
    }

//    /**
//     * @return Motorisation[] Returns an array of Motorisation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Motorisation
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

   public function findMotorisationByModele($modeleid = null)
    {
         $queryBuilder = $this->createQueryBuilder('m')
                ->leftJoin('m.id_modele', 'a');
    
                if($modeleid !== null) {
                     $queryBuilder->andWhere('a.id = :modeleid')
                     ->setParameter('modeleid', $modeleid);
                }
    return $queryBuilder->getQuery()->getResult();

}
}