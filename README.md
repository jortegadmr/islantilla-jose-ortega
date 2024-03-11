# Instalación Proyecto Islantilla

Pasos para restaurar el proyecto:

1. Creación de la base de datos: --> php bin/console doctrine:database:create
2. Generar los Migrations --> php bin/console make:migration
3. Aplicar las Migrations --> php bin/console doctrine:migrations:migrate
4. Cargar las Fixtures/Datos --> php bin/console doctrine:fixtures:load
    >Careful, database "islantilla" will be purged. Do you want to continue? (yes/no) [yes]:
    


## inicio 

http://localhost:8000/

Esta plantilla de inicio muestra la página principal, basado en el diseño de AMA Islantilla Resort. Todo el proyecto es navegable, los enlaces funcionales pedidos son:

1.  EL RESORT
2.  HABITACIONES
3.  RESTAURANTES
4.  SPA
5.  GOLF
6.  RESERVAR

## EL RESORT 

http://localhost:8000/actividades

En este enlace se muestra la entidad Actividades, en dicha página se puede realizar un CRUD completo, mediante los botones de acciones (mostrar y editar) y el botón de Nueva Actividad.

## HABITACIONES

http://localhost:8000/habitaciones

En este enlace se muestra la entidad Habitacion, en dicha página se puede realizar un CRUD completo, mediante los botones de acciones (mostrar y editar) y el botón de NUEVA HABITACION. La tabla que se muestra realiza una consulta y se muestra, aparte de las habitaciones, los usuarios que la ocupan.

En esta página también se enceuntra el botón FILTRAR HABITACION, dicho boton nos lleva a:

 https://localhost:8000/habitaciones/filtrar

 Aquí se realiza consultas sobre las habitaciones ocupadas, se puede filtrar por tipo de hbaitación.

 ## RESTAURANTES

https://localhost:8000/actividades/filtrar/Restaurantes

Este enlace nos muestra (filtrado) la consulta de Restaurante (Categoría) dentro de Actividades. Aqui se pude ver todos los Restaurantes. El botón de VER RESERVAS se realiza una consulta JSON que muestra las reservas de los usuarios en la categoría de Restaurante:

https://localhost:8000/actividades/reservas/Restaurantes

## SPA

https://localhost:8000/actividades/filtrar/SPA

Este enlace nos muestra (filtrado) la consulta de SPA (Categoría) dentro de Actividades. El botón de VER RESERVAS se realiza una consulta JSON que muestra las reservas de los usuarios en la categoría de SPA:

https://localhost:8000/actividades/reservas/SPA

## GOLF

https://localhost:8000/actividades/filtrar/Deporte

Este enlace nos muestra (filtrado) la consulta de Deporte (Categoría) dentro de Actividades. El botón de VER RESERVAS se realiza una consulta JSON que muestra las reservas de los usuarios en la categoría de Deporte:

https://localhost:8000/actividades/reservas/Deporte

## RESERVAR

http://localhost:8000/usuarios

En este enlace se muestra la entidad Usuario, en dicha página se puede realizar un CRUD completo, mediante los botones de acciones (mostrar y editar) y el botón de NUEVO CLIENTE. La tabla que se muestra realiza una consulta y se muestra los usuarios dados de alta.

En esta página también se enceuntra el botón FILTRAR CLIENTE, dicho boton nos lleva a:

 https://localhost:8000/usuarios/filtrar

 Aquí se realiza consultas sobre las nacionalidades de los clientes.