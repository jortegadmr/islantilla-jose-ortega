<?php

namespace App\DataFixtures;

use App\Entity\Actividades;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActividadesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $actividadesData = [
            ['Centro SPA & Wellness', 'SPA', '2024-03-16', '2024-03-16'],
            ['GOLF', 'Deporte', '2024-03-16', '2024-03-16'],
            ['Buffet Ostras', 'Restaurantes', '2024-03-17', '2024-03-19'],
            ['Fandado Bar Restaurante', 'Restaurantes', '2024-04-07', '2024-04-07'],
            ['Pool Bar', 'Restaurantes', '2024-03-22', '2024-03-23'],
            ['Kiosko Bar', 'Restaurantes', '2024-03-30', '2024-03-30']
        ];

        foreach ($actividadesData as $actividadData) {
            $actividad = new Actividades();
            $actividad->setNombre($actividadData[0]);
            $actividad->setCategoria($actividadData[1]);
            $actividad->setFechaInicio(new \DateTime($actividadData[2]));
            $actividad->setFechaFin(new \DateTime($actividadData[3]));

            $manager->persist($actividad);
        }

        $manager->flush();
    }

}
