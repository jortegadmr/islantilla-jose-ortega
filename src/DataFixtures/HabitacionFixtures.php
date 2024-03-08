<?php

namespace App\DataFixtures;

use App\Entity\Habitacion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HabitacionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $habitacionesData = [
            ['Habitación Estandar', 2, 1001],
            ['Habitación Estandar', 2, 1002],
            ['Habitación Estandar', 2, 1003],
            ['Habitación Estandar', 2, 1004],
            ['Habitación Deluxe', 2, 2001],
            ['Habitación Deluxe', 2, 2002],
            ['Habitación Deluxe', 2, 2003],
            ['Habitación Deluxe', 2, 2004],
            ['Apartamento Premium', 4, 3001],
            ['Apartamento Premium', 4, 3002],
            ['Apartamento Premium', 4, 3003],
            ['Apartamento Premium', 4, 3004],
            ['Apartamento Luxury', 4, 4001],
            ['Apartamento Luxury', 4, 4002],
            ['Apartamento Luxury', 4, 4003],
            ['Apartamento Luxury', 4, 4004]
        ];

        foreach ($habitacionesData as $habitacionData) {
            $habitacion = new Habitacion();
            $habitacion->setNombre($habitacionData[0]);
            $habitacion->setCapacidad($habitacionData[1]);
            $habitacion->setNumero($habitacionData[2]);

            $manager->persist($habitacion);
        }

        $manager->flush();
    }
}
