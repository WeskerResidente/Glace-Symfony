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
            

            //AFFICHE UN MESSAGE QUAND FORMULAIRE REMPLI ET ENVOYE
            $this->addFlash('success', 'La glace a bien été enregistrée !');
            // PERMET LA MISE A ZERO DU FORMULAIRE
            return $this->redirectToRoute('app_ajout_glace');
        }
        return $this->render('ajout_glace/ajout_glace.html.twig', [
                'form' => $form->createView()
        ]);
    }
}
