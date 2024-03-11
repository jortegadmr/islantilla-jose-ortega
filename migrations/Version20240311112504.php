<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240311112504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actividades (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, categoria VARCHAR(255) NOT NULL, fecha_inicio DATE DEFAULT NULL, fecha_fin DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actividades_usuario (actividades_id INT NOT NULL, usuario_id INT NOT NULL, INDEX IDX_CEDF19932F4F3E2F (actividades_id), INDEX IDX_CEDF1993DB38439E (usuario_id), PRIMARY KEY(actividades_id, usuario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitacion (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, numero INT NOT NULL, capacidad INT NOT NULL, INDEX IDX_F45995BADB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, apellidos VARCHAR(255) NOT NULL, fecha DATE DEFAULT NULL, pais VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actividades_usuario ADD CONSTRAINT FK_CEDF19932F4F3E2F FOREIGN KEY (actividades_id) REFERENCES actividades (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actividades_usuario ADD CONSTRAINT FK_CEDF1993DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE habitacion ADD CONSTRAINT FK_F45995BADB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        // Datos Usuario
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('juanperez@mail.com', 'Juan', 'Perez', '1990-05-15', 'España')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('mariagonzalez@mail.com', 'María', 'González', '1985-08-20', 'México')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('carloslopez@mail.com', 'Carlos', 'López', '1978-03-10', 'Argentina')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('anamartinez@mail.com', 'Ana', 'Martínez', '1995-11-25', 'Colombia')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('pedrogarcia@mail.com', 'Pedro', 'García', '1980-09-30', 'Perú')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('laurarodriguez@mail.com', 'Laura', 'Rodríguez', '1987-06-12', 'Chile')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('josefernandez@mail.com', 'José', 'Fernández', '1992-02-28', 'España')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('luisafernandez@mail.com', 'Luisa', 'Fernández', '1983-04-17', 'Paraguay')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('carolinamartinez@mail.com', 'Carolina', 'Martínez', '1975-12-03', 'Chile')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('marceloperez@mail.com', 'Marcelo', 'Pérez', '1977-09-05', 'México')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('marianomontero@mail.com', 'Mariano', 'Montero', '1977-09-05', 'México')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('lucianagarcia@mail.com', 'Luciana', 'García', '1982-11-28', 'Argentina')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('davidgomez@mail.com', 'David', 'Gómez', '1988-10-05', 'Colombia')");
        $this->addSql("INSERT INTO usuario (email, nombre, apellidos, fecha, pais) VALUES ('camilamartinez@mail.com', 'Camila', 'Martínez', '1986-03-18', 'Colombia')");
        // Datos Habitacion
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Habitación Estandar', 1001, 2, 1)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Habitación Estandar', 1002, 2, 2)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Habitación Estandar', 1003, 2, 3)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad) VALUES ('Habitación Estandar', 1004, 2)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Habitación Deluxe', 2001, 2, 5)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Habitación Deluxe', 2002, 2, 6)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Habitación Deluxe', 2003, 2, 7)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Habitación Deluxe', 2004, 2, 8)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Apartamento Premium', 3001, 4, 9)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Apartamento Premium', 3002, 4, 10)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad) VALUES ('Apartamento Premium', 3003, 4)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad) VALUES ('Apartamento Premium', 3004, 4)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad, usuario_id) VALUES ('Apartamento Luxury', 4001, 4, 13)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad) VALUES ('Apartamento Luxury', 4002, 4)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad) VALUES ('Apartamento Luxury', 4003, 4)");
        $this->addSql("INSERT INTO habitacion (nombre, numero, capacidad) VALUES ('Apartamento Luxury', 4004, 4)");
         // Datos Actividades
         $this->addSql("INSERT INTO actividades (nombre, categoria, fecha_inicio, fecha_fin) VALUES ('Centro SPA & Wellness', 'SPA', '2024-03-16' , '2024-03-16')");
         $this->addSql("INSERT INTO actividades (nombre, categoria, fecha_inicio, fecha_fin) VALUES ('GOLF', 'Deporte', '2024-03-16' , '2024-03-16')");
         $this->addSql("INSERT INTO actividades (nombre, categoria, fecha_inicio, fecha_fin) VALUES ('Buffet Ostras', 'Restaurantes', '2024-03-17' , '2024-03-17')");
         $this->addSql("INSERT INTO actividades (nombre, categoria, fecha_inicio, fecha_fin) VALUES ('Fandado Bar Restaurante', 'Restaurantes', '2024-04-26' , '2024-04-27')");
         $this->addSql("INSERT INTO actividades (nombre, categoria, fecha_inicio, fecha_fin) VALUES ('Pool Bar', 'Restaurantes', '2024-04-01' , '2024-04-03')");
         $this->addSql("INSERT INTO actividades (nombre, categoria, fecha_inicio, fecha_fin) VALUES ('Kiosko Bar', 'Restaurantes', '2024-03-30' , '2024-03-30')");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividades_usuario DROP FOREIGN KEY FK_CEDF19932F4F3E2F');
        $this->addSql('ALTER TABLE actividades_usuario DROP FOREIGN KEY FK_CEDF1993DB38439E');
        $this->addSql('ALTER TABLE habitacion DROP FOREIGN KEY FK_F45995BADB38439E');
        $this->addSql('DROP TABLE actividades');
        $this->addSql('DROP TABLE actividades_usuario');
        $this->addSql('DROP TABLE habitacion');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
