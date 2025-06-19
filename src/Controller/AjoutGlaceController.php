<?php

namespace App\Controller;

use App\Entity\Glace;
use App\Form\AjoutGlaceTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AjoutGlaceController extends AbstractController
{
    #[Route('/ajout/glace', name: 'app_ajout_glace')]
    public function ajout_glace(Request $request, EntityManagerInterface $entityManager): Response
    {

        $AjoutGlace = new Glace();

        $form = $this->createForm(AjoutGlaceTypeForm::class, $AjoutGlace);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($AjoutGlace);

            $entityManager->flush();
        }
        return $this->render('ajout_glace/ajout_glace.html.twig', [
                'form' => $form->createView()
        ]);
    }
}
