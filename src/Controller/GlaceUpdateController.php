<?php

namespace App\Controller;

use App\Entity\Glace;
use App\Form\AjoutGlaceTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class GlaceUpdateController extends AbstractController
{
    #[Route('/modifier/glace/{id}', name: 'app_modifier_glace')]
    public function modifier_glace(Glace $glace, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Le formulaire est lié à une glace existante (Pas besoin de new Glace)
        $form = $this->createForm(AjoutGlaceTypeForm::class, $glace);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();

            $this->addFlash('success', 'La glace a bien été modifiée !');

            return $this->redirectToRoute('app_ajout_glace');
        }

        return $this->render('glace_update/modifier_glace.html.twig', [
            'form' => $form->createView(),
            'glace' => $glace
        ]);
    }
}
