<?php

namespace App\Controller;

use App\Repository\GlaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListesDesGlacesController extends AbstractController
{
    #[Route('/listes/des/glaces', name: 'app_listes_des_glaces')]
    public function index(GlaceRepository $repository): Response
    {
        $glaces = $repository->findAll();

        return $this->render('listes_des_glaces/listes_des_glaces.html.twig', [
            'glaces' => $glaces
        ]);
    }
}
