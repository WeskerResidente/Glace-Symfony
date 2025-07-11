<?php

namespace App\Controller\Admin;

use App\Entity\Glace;
use App\Entity\Cornet;
use App\Entity\Topping;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminController extends AbstractDashboardController
{
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/admin.html.twig');
        // return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Glace');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Glaces', 'fas fa-ice-cream', Glace::class);
        yield MenuItem::linkToCrud('Cornet', 'fas fa-ice-cream', Cornet::class);
        yield MenuItem::linkToCrud('Topping', 'fas fa-ice-cream', Topping::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-ice-cream', User::class);
    }
}
