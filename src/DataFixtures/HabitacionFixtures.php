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
            ['Habitación Estandar', 2, 1001, 4],
            ['Habitación Estandar', 2, 1002, null],
            ['Habitación Estandar', 2, 1003, null],
            ['Habitación Estandar', 2, 1004, null],
            ['Habitación Deluxe', 2, 2001, 3],
            ['Habitación Deluxe', 2, 2002, 8],
            ['Habitación Deluxe', 2, 2003, null],
            ['Habitación Deluxe', 2, 2004, null],
            ['Apartamento Premium', 4, 3001, null],
            ['Apartamento Premium', 4, 3002, 1],
            ['Apartamento Premium', 4, 3003, null],
            ['Apartamento Premium', 4, 3004, null],
            ['Apartamento Luxury', 4, 4001, 2],
            ['Apartamento Luxury', 4, 4002, null],
            ['Apartamento Luxury', 4, 4003, null],
            ['Apartamento Luxury', 4, 4004, null]
        ];

        foreach ($habitacionesData as $habitacionData) {
            $habitacion = new Habitacion();
            $habitacion->setNombre($habitacionData[0]);
            $habitacion->setCapacidad($habitacionData[1]);
            $habitacion->setNumero($habitacionData[2]);
            $habitacion->setUsuario($habitacionData[3]);

            $manager->persist($habitacion);
        }

        $manager->flush();
    }
}
