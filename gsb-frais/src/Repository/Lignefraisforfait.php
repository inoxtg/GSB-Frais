<?php

namespace App\Repository;

use App\Entity\Lignefraisforfait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lignefraisforfait>
 *
 * @method Lignefraisforfait|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lignefraisforfait|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lignefraisforfait[]    findAll()
 * @method Lignefraisforfait[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Lignefraisforfait extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lignefraisforfait::class);
    }

    public function save(Lignefraisforfait $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Lignefraisforfait $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Lignefraisforfait[] Returns an array of Lignefraisforfait objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Lignefraisforfait
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
