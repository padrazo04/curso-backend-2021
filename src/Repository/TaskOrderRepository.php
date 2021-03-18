<?php

namespace App\Repository;

use App\Entity\TaskOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TaskOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaskOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaskOrder[]    findAll()
 * @method TaskOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaskOrder::class);
    }

    // /**
    //  * @return TaskOrder[] Returns an array of TaskOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TaskOrder
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
