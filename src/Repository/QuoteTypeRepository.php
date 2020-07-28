<?php

namespace App\Repository;

use App\Entity\QuoteType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuoteType|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuoteType|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuoteType[]    findAll()
 * @method QuoteType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuoteTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuoteType::class);
    }
}
