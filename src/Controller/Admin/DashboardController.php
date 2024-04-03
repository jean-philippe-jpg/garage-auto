<?php

namespace App\Controller\Admin;

use App\Entity\DetailsServices;
use App\Entity\Marques;
use App\Entity\Modeles;
use App\Entity\Motorisation;
use App\Entity\Services;
use App\Entity\User;
use App\Entity\VMarques;
use App\Entity\VModeles;
use App\Entity\Voitures;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('/dashboard.html.twig');

       
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Perrot Automobile');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('detailsServices', 'fas fa-list', DetailsServices::class);
         yield MenuItem::linkToCrud('services', 'fas fa-list', Services::class);
         yield MenuItem::linkToCrud('user', 'fas fa-list', User::class);
         yield MenuItem::linkToCrud('voitures', 'fas fa-list', Voitures::class);
         yield MenuItem::linkToCrud('vMarques', 'fas fa-list', VMarques::class);
         yield MenuItem::linkToCrud('vModeles', 'fas fa-list', VModeles::class);    
         yield MenuItem::linkToCrud('marques', 'fas fa-list', Marques::class);
         yield MenuItem::linkToCrud('modeles', 'fas fa-list', Modeles::class);
         yield MenuItem::linkToCrud('motorisation', 'fas fa-list', Motorisation::class);
    }
}
