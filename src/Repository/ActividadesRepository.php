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
                    ->getResult(); // Obtiene los resultados como objetos de la clase Actividad

    // Convertir las reservas a JSON
    $json = [];
    foreach ($results as $actividad) {
        // Para cada actividad, obtenemos la colección de usuarios asociados
        $usuarios = $actividad->getIdUsuario();
    
        // Iteramos sobre la colección de usuarios para obtener los nombres
        $nombresUsuarios = [];
        foreach ($usuarios as $usuario) {
            $nombresUsuarios = $usuario->getNombre(); // Suponiendo que 'getNombre()' es el método para obtener el nombre del usuario
        }
    
        // Construimos el array con el nombre de la actividad y los nombres de los usuarios asociados
        $json[] = [
            'nombre_actividad' => $actividad->getNombre(), // Nombre de la actividad
            'nombres_usuarios' => $nombresUsuarios, // Nombres de los usuarios asociados
        ];
    }
    
    
    return $json; // Retorna el array JSON
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

