<?php

namespace App\Repository;

use App\Entity\Location;
use App\Entity\WeatherData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeatherData>
 *
 * @method WeatherData|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherData|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherData[]    findAll()
 * @method WeatherData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherData::class);
    }

//    /**
//     * @return WeatherData[] Returns an array of WeatherData objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WeatherData
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findByLocation(Location $location)
    {
        $qb = $this->createQueryBuilder('w');
        $qb->where('w.location_id = :location')
            ->setParameter('location', $location->getId())
            ->andWhere('w.measurement_time = :now')
            ->setParameter('now', '2024-10-21');


        $query = $qb->getQuery();
        $result = $query->getResult();

        return $result;
    }


}
