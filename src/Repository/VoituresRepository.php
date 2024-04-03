<?php

namespace App\Repository;

use App\Entity\Voitures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Voitures>
 *
 * @method Voitures|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voitures|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voitures[]    findAll()
 * @method Voitures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoituresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voitures::class);
    }

//    /**
//     * @return Voitures[] Returns an array of Voitures objects
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

//    public function findOneBySomeField($value): ?Voitures
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

   // public function findByMarque($marque): array
   // {
       // return $this->createQueryBuilder('v')
          //  ->andWhere('v.id_marque = :marque')
           // ->setParameter('marque', $marque)
           // ->getQuery()
           // ->getResult()
       // ;
   // }

   // public function findByModele($modele): array
   // {
        //return $this->createQueryBuilder('v')
           // ->andWhere('v.id_modele = :modele')
           // ->setParameter('modele', $modele)
           // ->getQuery('v')
           // ->getResult('v')
       // ;
   // }


    public function findByMarque($marque = null)
{
    $queryBuilder = $this->createQueryBuilder('v')
              ->leftJoin('v.id_marque', 'm');

              if($marque !== null) {
                  $queryBuilder->Where('m.id = :marque')
                  ->setParameter('marque', $marque);
              }
                  return $queryBuilder->getQuery()->getResult();
   
                }

}
     //public function findByMotorisation($motorisation): array   


