<?php

namespace App\Controller;

use App\Entity\Marques;
use App\Entity\Modeles;
use App\Entity\Services;
use App\Entity\Voitures;
use App\Entity\Motorisation;
use App\Entity\DetailsServices;
use App\Repository\MarquesRepository;
use App\Repository\ModelesRepository;
use App\Repository\ServicesRepository;
use App\Repository\VMarquesRepository;
use App\Repository\VModelesRepository;
use App\Repository\VoituresRepository;
use App\Repository\MotorisationRepository;
use App\Repository\DetailsServicesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class PagesController extends AbstractController
{



    #[Route('/', name: 'app_accueil', methods: ['GET'])]
    public function accueil( TranslatorInterface $translator, VMarquesRepository $Vmarques, VModelesRepository $Vmodeles, ModelesRepository $modeles,VoituresRepository $voiture, MarquesRepository $marques, ServicesRepository $service, DetailsServicesRepository $detailsService, MotorisationRepository $motorisation, Request $request): Response

    {  
        

        
         $marquesid = $request->get('marqueid');
         $modelesid = $request->get('modeleid');
         $motorisationid = $request->get('motorisationid');
         
         $marques = $marques->findAll();

        $modeles = $modeles->findModelesByMarque($marquesid);
        $motorisation = $motorisation->findMotorisationByModele($modelesid);
        $services = $service->findServicesByMotorisation($motorisationid);
        
        
        $vmarque = $request->get('marque');
        $vmodele = $request->get('modele');
        $marques = $Vmarques->findAll();

        $annonces = $voiture->findByModele($vmodele);
        $marque = $Vmodeles->findVmodeleByVmarque($vmarque);
        
        //$details = $detailsService->findAll();
      

    
        return $this->render('pages/accueil.html.twig', [
            'motorisation' => $motorisation,
            'services' => $services,
            'marques' => $marques,
            'modeles' => $modeles,

            'voitures' => $annonces,
            'Vmarques' => $marques,
            'Vmodeles' => $marque,
            
            
        ]);
    }


      #[route('/prestation',name: 'app_detail', methods:['GET'])]
     public function details(DetailsServicesRepository $detail, Request $request)
   {
    $servicesid = $request->get('service');
    $details = $detail->findDetailsServicesByServices($servicesid);

    return $this->render('pages/prestation.html.twig',[
        'details' => $details,
               
    

    ]);
   }

    #[Route('/description/{description}', name: 'app_description', methods: ['GET'])]
    public function description(Voitures  $voiture): Response
    {
           
            
        return $this->render('pages/description.html.twig', [
          'description' => $voiture,
        ]);
    }

   

}
