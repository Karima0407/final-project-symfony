<?php

namespace App\Repository;

use App\Entity\Maquillage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Maquillage>
 *
 * @method Maquillage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maquillage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maquillage[]    findAll()
 * @method Maquillage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaquillageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maquillage::class);
    }

//    /**
//     * @return Maquillage[] Returns an array of Maquillage objects
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

//    public function findOneBySomeField($value): ?Maquillage
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
