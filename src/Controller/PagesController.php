<?php

namespace App\Controller;

use App\Entity\DetailsServices;
use App\Repository\ServicesRepository;
use App\Repository\VoituresRepository;
use App\Repository\DetailsServicesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{

    #[Route('/', name: 'app_accueil')]
    public function accueil( ServicesRepository $services): Response
    {
        $services = $services->findAll();
       
        return $this->render('pages/accueil.html.twig', [
            'service' => $services,
        ]);
    }


    #[Route('/annonces', name: 'app_annonces')]
    public function index(VoituresRepository $voiture, ServicesRepository $services ): Response
    {
           
       
        
            $voitures = $voiture->findAll();
            $services = $services->findAll();

        return $this->render('pages/index.html.twig', [
            'voitures' => $voitures,
            'service' => $services,
        ]);
    }

         

    #[Route('/services/{id}', name: 'app_services_show')]
    public function show(ServicesRepository $services,  DetailsServices $detail): Response
    {
        $services = $services->findAll();
        
      
       
        return $this->render('pages/detail.html.twig', [
            'service' => $services,
            'detail' => $detail,
        ]);
    }

}
