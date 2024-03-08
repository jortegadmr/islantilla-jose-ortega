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
            ['SPA', 'SPA'],
            ['GOLF', 'Deporte'],
            ['Buffet Ostras', 'Restaurantes'],
            ['Fandado Bar Restaurante', 'Restaurantes'],
            ['Pool Bar', 'Restaurantes'],
            ['Kiosko Bar', 'Restaurantes']
        ];

        foreach ($actividadesData as $actividadData) {
            $actividad = new Actividades();
            $actividad->setNombre($actividadData[0]);
            $actividad->setCategoria($actividadData[1]);

            $manager->persist($actividad);
        }

        $manager->flush();
    }
}
