<?php

namespace App\Controller;

use App\Entity\Marques;
use App\Entity\Modeles;
use App\Entity\Motorisation;
use App\Entity\DetailsServices;
use App\Entity\Services;
use App\Repository\MarquesRepository;
use App\Repository\ModelesRepository;
use App\Repository\ServicesRepository;
use App\Repository\VoituresRepository;
use App\Repository\MotorisationRepository;
use App\Repository\DetailsServicesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{



    #[Route('/', name: 'app_accueil')]
    public function accueil( MotorisationRepository $motorisation): Response
    {
        $motorisation = $motorisation->findAll();
       
        return $this->render('pages/accueil.html.twig', [
            'motorisation' => $motorisation,
        ]);
    }

    #[Route('/service/{id}', name: 'app_service')]
    public function service(Services $idservice, ServicesRepository $services): Response
    {
        //$services = $idservice->findAll();
       
        return $this->render('pages/accueil.html.twig', [
            'services' => $idservice,
        ]);
    }

   


    #[Route('/annonces', name: 'app_annonces')]
    public function index(VoituresRepository $voiture, ServicesRepository $services ): Response
    {
           
            $voitures = $voiture->findAll();
            //$services = $services->findAll();

        return $this->render('pages/index.html.twig', [
            'voitures' => $voitures,
            //'service' => $services,
        ]);
    }


    #[Route('/prestation/{id}', name: 'app_prestation')]
    public function prestation(DetailsServices $detail, ServicesRepository $services ): Response
    {
           
            //$prestation = $detail->findAll();
            //$services = $services->findAll();
        return $this->render('pages/prestation.html.twig', [
            'details' => $detail,
            //'service' => $services,
        ]);
    }

   

}
