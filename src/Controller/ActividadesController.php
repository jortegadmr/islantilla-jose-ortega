<?php

namespace App\Controller;

use App\Entity\Actividades;
use App\Form\ActividadesType;
use App\Repository\ActividadesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/actividades')]
class ActividadesController extends AbstractController
{
    #[Route('/', name: 'app_actividades_index', methods: ['GET'])]
    public function index(ActividadesRepository $actividadesRepository): Response
    {
        return $this->render('actividades/index.html.twig', [
            'actividades' => $actividadesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_actividades_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actividade = new Actividades();
        $form = $this->createForm(ActividadesType::class, $actividade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actividade);
            $entityManager->flush();

            return $this->redirectToRoute('app_actividades_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('actividades/new.html.twig', [
            'actividade' => $actividade,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_actividades_show', methods: ['GET'])]
    public function show(Actividades $actividade): Response
    {
        return $this->render('actividades/show.html.twig', [
            'actividade' => $actividade,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_actividades_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Actividades $actividade, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActividadesType::class, $actividade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_actividades_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('actividades/edit.html.twig', [
            'actividade' => $actividade,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_actividades_delete', methods: ['POST'])]
    public function delete(Request $request, Actividades $actividade, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actividade->getId(), $request->request->get('_token'))) {
            $entityManager->remove($actividade);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_actividades_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/filtrar/{categoria}', name: 'app_actividades_filtrar', methods: ['GET'])]
    public function filtrarActividades($categoria, ActividadesRepository $actividadesRepository): Response
        {
            $actividadesFiltradas = $actividadesRepository->findByCategoria($categoria);

            return $this->render('actividades/filtradas.html.twig', [
                'actividades' => $actividadesFiltradas,
                'categoria' => $categoria,
            ]);
        }
    
        #[Route('/actividades/reservas/{categoria}', name: 'app_actividades_reservas', methods: ['GET'])]
        public function verReservas($categoria, ActividadesRepository $actividadesRepository, SerializerInterface $serializer): Response
        {
            $reservas = $actividadesRepository->reservasCategoria($categoria);
        
            // Serializar las reservas a JSON utilizando el servicio de serialización
            $json = $serializer->serialize($reservas, 'json', ['groups' => 'actividades']);
        
            // Decodificar el JSON para obtener un array PHP
            $reservasArray = json_decode($json, true);
        
            // Renderizar la plantilla Twig con los datos de las reservas
            return $this->render('actividades/reservas.html.twig', [
                'reservas' => $reservasArray,
            ]);
        }
    }