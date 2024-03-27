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
use Symfony\Component\HttpFoundation\Request;

class PagesController extends AbstractController
{



    #[Route('/', name: 'app_accueil', methods: ['GET'])]
    public function accueil(ModelesRepository $modeles, MarquesRepository $marques, ServicesRepository $service, MotorisationRepository $motorisation, Request $request): Response

    {  


        
         //$marques = $request->get('marquesid');
        //$modeles = $modeles->findModelesByMarque($marques);

         ////$modelesid = $request->get('modelesid');
        //$motorisation = $motorisation->findMotorisationByModele($modelesid);

        // $motorisation = $request->get('motorisationid');
       // $services = $service->findServicesByMotorisation($motorisation);
       $services = $service->findAll();
        $marques = $marques->findAll();
        $modeles = $modeles->findAll();
        $motorisation = $motorisation->findAll();
    
        return $this->render('pages/accueil.html.twig', [
            'motorisation' => $motorisation,
            'services' => $services,
            'marques' => $marques,
            'modeles' => $modeles,
            
        ]);
    }

   


   


    #[Route('/annonces', name: 'app_annonces', methods: ['GET'])]
    public function index(VoituresRepository $voiture, ServicesRepository $services ): Response
    {
           
            $voitures = $voiture->findAll();
            //$services = $services->findAll();

        return $this->render('pages/index.html.twig', [
            'voitures' => $voitures,
            //'service' => $services,
        ]);
    }


    #[Route('/prestation/{id}', name: 'app_prestation', methods: ['GET'])]
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
