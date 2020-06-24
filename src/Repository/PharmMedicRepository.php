<?php

namespace App\Repository;

use App\Entity\PharmMedic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PharmMedic|null find($id, $lockMode = null, $lockVersion = null)
 * @method PharmMedic|null findOneBy(array $criteria, array $orderBy = null)
 * @method PharmMedic[]    findAll()
 * @method PharmMedic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PharmMedicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PharmMedic::class);
    }

    // /**
    //  * @return PharmMedic[] Returns an array of PharmMedic objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PharmMedic
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
