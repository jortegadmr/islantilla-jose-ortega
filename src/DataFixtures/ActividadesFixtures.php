<?php

namespace App\DataFixtures;

use App\Entity\Actividades;
use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActividadesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $actividadesData = [
            ['Centro SPA & Wellness', 'SPA', '2024-03-16', '2024-03-16', 2],
            ['GOLF', 'Deporte', '2024-03-16', '2024-03-16', 3],
            ['Buffet Ostras', 'Restaurantes', '2024-03-17', '2024-03-19', 4],
            ['Fandado Bar Restaurante', 'Restaurantes', '2024-04-07', '2024-04-07', 5],
            ['Pool Bar', 'Restaurantes', '2024-03-22', '2024-03-23', 6],
            ['Kiosko Bar', 'Restaurantes', '2024-03-30', '2024-03-30', 7]
        ];

        foreach ($actividadesData as $actividadData) {
            $actividad = new Actividades();
            $actividad->setNombre($actividadData[0]);
            $actividad->setCategoria($actividadData[1]);
            $actividad->setFechaInicio(new \DateTime($actividadData[2]));
            $actividad->setFechaFin(new \DateTime($actividadData[3]));
            $idUsuario = $actividadData[4];
            $usuario = $manager->getRepository(Usuario::class)->find($idUsuario);
            if ($usuario) {
                $actividad->addIdUsuario($usuario); // Utiliza el método addIdUsuario() para agregar el usuario
            } else {
                throw new \Exception("No se pudo encontrar el usuario con ID: $idUsuario");
            }

            $manager->persist($actividad);
        }

        $manager->flush();
    }

}
