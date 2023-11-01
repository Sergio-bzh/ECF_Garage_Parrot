<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\Contact;
use App\Entity\Employee;
use App\Entity\Garage;
use App\Entity\Image;
use App\Entity\Option;
use App\Entity\Model;
use App\Entity\Scheldule;
use App\Entity\Service;
use App\Entity\Testimonial;
use App\Entity\Vehicle;
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
        return $this->render('admin/dashboard.html.twig');
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ecf Garage Parrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-dashboard');
        yield MenuItem::linkToCrud('Garage', 'fas fa-home', Garage::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-circle', Scheldule::class);
        yield MenuItem::linkToCrud('Employés', 'fas fa-user', Employee::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-list', Service::class);
        yield MenuItem::linkToCrud('Marques', 'fas fa-list', Brand::class);
        yield MenuItem::linkToCrud('Modèles', 'fas fa-list', Model::class);
        yield MenuItem::linkToCrud('Véhicules', 'fas fa-car', Vehicle::class);
        yield MenuItem::linkToCrud('Options', 'fas fa-list', Option::class);
        // yield MenuItem::linkToCrud('Image', 'fas fa-image', Image::class);
        yield MenuItem::linkToCrud('Témoignages', 'fas fa-pen', Testimonial::class);
        yield MenuItem::linkToCrud('Demandes de contact', 'fas fa-question', Contact::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
