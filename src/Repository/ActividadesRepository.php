<?php

namespace App\Repository;

use App\Entity\Actividades;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Actividades>
 *
 * @method Actividades|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actividades|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actividades[]    findAll()
 * @method Actividades[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActividadesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actividades::class);
    }

    public function reservasCategoria(string $categoria): array
    {
    // Obtiene las reservas para la categoría especificada
    $results = $this->createQueryBuilder('a')
                    ->join('a.IdUsuario', 'u')
                    ->where('a.categoria = :categoria')
                    ->setParameter('categoria', $categoria)
                    ->getQuery()
                    ->getResult();

    // **Cambios para convertir las reservas a JSON:**

    // Opción 1: Usar `json_encode`
    $json = []; 
    foreach ($results as $actividad) {
        $json[] = [
        // 'id' => $actividad->getId(), No queremos el ID
        'nombre' => $actividad->getNombre(),
        
        
        ];
    }
    return $json; /* Modifica el retorno a un array JSON */
    }

}


    //    /**
    //     * @return Actividades[] Returns an array of Actividades objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Actividades
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

