<?php

namespace App\Repository\MultimediaRequest;

use App\Entity\MultimediaRequest\PublicationRequestType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PublicationRequestType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PublicationRequestType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PublicationRequestType[]    findAll()
 * @method PublicationRequestType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicationRequestTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PublicationRequestType::class);
    }

//    /**
//     * @return PublicationRequestType[] Returns an array of PublicationRequestType objects
//     */
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
    public function findOneBySomeField($value): ?PublicationRequestType
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
