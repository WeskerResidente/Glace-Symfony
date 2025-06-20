<?php

namespace App\Controller;

use App\Entity\Glace;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class GlaceDeleteController extends AbstractController
{
    #[Route('/glace/supprimer/{id}', name: 'delete_glace')]
    public function delete(Glace $glace, Request $request, EntityManagerInterface $entityManager): Response
    {

        if ($this->isCsrfTokenValid('SUP' . $glace->getId(), $request->get('_token'))) {

            $entityManager->remove($glace);

            $entityManager->flush();

            $this->addFlash('success', 'La glace a bien été supprimée.');
        }

        return $this->redirectToRoute('app_listes_des_glaces');
    }
}
