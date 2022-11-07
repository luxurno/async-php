<?php

namespace App\Repository\Mssql;

use App\Entity\Mssql\Jacket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Jacket>
 *
 * @method Jacket|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jacket|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jacket[]    findAll()
 * @method Jacket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JacketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jacket::class);
    }

    public function save(Jacket $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
