<?php

namespace App\Repository\Mysql;

use App\Entity\Mysql\Bags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bags>
 *
 * @method Bags|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bags|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bags[]    findAll()
 * @method Bags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BagsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bags::class);
    }

    public function save(Bags $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
