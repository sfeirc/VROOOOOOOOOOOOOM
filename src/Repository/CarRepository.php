<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function save(Car $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Car $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return Car[] Returns an array of Car objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Car
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findBySearchQuery(string $query): array
    {
        return $this->createQueryBuilder('c')
            ->join('c.brand', 'b')
            ->where('c.model LIKE :query')
            ->orWhere('b.name LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findByFilters(
        ?string $query = null,
        ?array $brands = null,
        ?array $types = null,
        ?array $energies = null,
        ?float $maxPrice = null,
        ?int $yearMin = null,
        ?int $yearMax = null,
        ?array $transmissions = null,
        string $sort = 'price_asc'
    ): array {
        $qb = $this->createQueryBuilder('c')
            ->join('c.brand', 'b')
            ->join('c.type', 't')
            ->join('c.status', 's');

        if ($query) {
            $qb->andWhere('c.model LIKE :query OR b.name LIKE :query')
                ->setParameter('query', '%' . $query . '%');
        }

        if ($brands && !empty($brands)) {
            $qb->andWhere('b.id IN (:brands)')
                ->setParameter('brands', $brands);
        }

        if ($types && !empty($types)) {
            $qb->andWhere('t.id IN (:types)')
                ->setParameter('types', $types);
        }

        if ($energies && !empty($energies)) {
            $qb->andWhere('c.energy IN (:energies)')
                ->setParameter('energies', $energies);
        }

        if ($maxPrice) {
            $qb->andWhere('c.rentalPrice <= :maxPrice')
                ->setParameter('maxPrice', $maxPrice);
        }

        if ($yearMin) {
            $qb->andWhere('c.year >= :yearMin')
                ->setParameter('yearMin', $yearMin);
        }

        if ($yearMax) {
            $qb->andWhere('c.year <= :yearMax')
                ->setParameter('yearMax', $yearMax);
        }

        if ($transmissions && !empty($transmissions)) {
            $qb->andWhere('c.transmission IN (:transmissions)')
                ->setParameter('transmissions', $transmissions);
        }

        // Apply sorting
        switch ($sort) {
            case 'price_desc':
                $qb->orderBy('c.rentalPrice', 'DESC');
                break;
            case 'year_desc':
                $qb->orderBy('c.year', 'DESC');
                break;
            case 'year_asc':
                $qb->orderBy('c.year', 'ASC');
                break;
            case 'price_asc':
            default:
                $qb->orderBy('c.rentalPrice', 'ASC');
                break;
        }

        return $qb->getQuery()->getResult();
    }

    public function findHighlighted(): array
    {
        return $this->createQueryBuilder('c')
            ->join('c.status', 's')
            ->where('s.type = :status')
            ->setParameter('status', 'Disponible')
            ->orderBy('c.id', 'DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();
    }
}
