<?php

namespace App\Repository;

use App\Entity\Framework;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Framework|null find($id, $lockMode = null, $lockVersion = null)
 * @method Framework|null findOneBy(array $criteria, array $orderBy = null)
 * @method Framework[]    findAll()
 * @method Framework[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrameworkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Framework::class);
    }

}
