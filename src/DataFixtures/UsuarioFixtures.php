<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsuarioFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $usuariosData = [
            ['juanperez@mail.com', 'Juan', 'Perez', '1990-05-15', 'España'],
            ['mariagonzalez@mail.com', 'María', 'González', '1985-08-20', 'México'],
            ['carloslopez@mail.com', 'Carlos', 'López', '1978-03-10', 'Argentina'],
            ['anamartinez@mail.com', 'Ana', 'Martínez', '1995-11-25', 'Colombia'],
            ['pedrogarcia@mail.com', 'Pedro', 'García', '1980-09-30', 'Perú']
        ];

        foreach ($usuariosData as $userData) {
            $usuario = new Usuario();
            $usuario->setEmail($userData[0]);
            $usuario->setNombre($userData[1]);
            $usuario->setApellidos($userData[2]);
            $usuario->setFecha(new \DateTime($userData[3]));
            $usuario->setPais($userData[4]);

            $manager->persist($usuario);
        }

        $manager->flush();
    }
}
