<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use App\Repository\VoituresRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(VoituresRepository $voiture, ServicesRepository $service ): Response
    {
           
            $voitures = $voiture->findAll();
            $services = $service->findAll();
        return $this->render('pages/index.html.twig', [
            'voitures' => $voitures,
            'service' => $services,
        ]);
    }
}
