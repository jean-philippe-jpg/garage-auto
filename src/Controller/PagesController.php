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
use App\Repository\VMarquesRepository;
use App\Repository\VModelesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends AbstractController
{



    #[Route('/', name: 'app_accueil', methods: ['GET'])]
    public function accueil(ModelesRepository $modeles, MarquesRepository $marques, ServicesRepository $service, MotorisationRepository $motorisation, Request $request): Response

    {  
        
         $marquesid = $request->get('marqueid');
         $modelesid = $request->get('modeleid');
         $motorisationid = $request->get('motorisationid');
         $marques = $marques->findAll();

        $modeles = $modeles->findModelesByMarque($marquesid);
        $motorisation = $motorisation->findMotorisationByModele($modelesid);
        $services = $service->findServicesByMotorisation($motorisationid);

       //$services = $service->findAll();
        //$marques = $marques->findAll();
       // $modeles = $modeles->findAll();
       // $motorisation = $motorisation->findAll();

    
        return $this->render('pages/accueil.html.twig', [
            'motorisation' => $motorisation,
            'services' => $services,
            'marques' => $marques,
            'modeles' => $modeles,
            //'marque' => $marques,
            
        ]);
    }

   
   


    #[Route('/annonces', name: 'app_annonces', methods: ['GET'])]
    public function index(VModelesRepository $Vmodeles, VMarquesRepository $Vmarques, VoituresRepository $voiture, ServicesRepository $services, Request $request ): Response
    {
        $vmarque = $request->get('marque');
        $vmodele = $request->get('modele');
        $marques = $Vmarques->findAll();


        // $annonce = $voiture->findByMarque($vmarque);
         $annonces = $voiture->findByModele($vmodele);
         $marque = $Vmodeles->findVmodeleByVmarque($vmarque);
            
        return $this->render('pages/index.html.twig', [
            'voitures' => $annonces,
            'Vmarques' => $marques,
            'Vmodeles' => $marque,
           //'annonce' => $annonce,
            //'filtreModeles' => $modeles,
            //'annonces' => $voiture,
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
