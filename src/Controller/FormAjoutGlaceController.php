<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FormAjoutGlaceController extends AbstractController
{
    #[Route('/form/ajout/glace', name: 'app_form_ajout_glace')]
    public function index(): Response
    {
        return $this->render('form_ajout_glace/index.html.twig', [
            'controller_name' => 'FormAjoutGlaceController',
        ]);
    }
}
