<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SignController extends AbstractController

{
    #[Route('/sign', name: 'app_sign')]
    public function register(Request $request,EntityManagerInterface $entityManager,UserPasswordHasherInterface $passwordEncoder): Response {
        $user = new User();
        $form = $this->createForm(SignTypeForm::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
 
            $user->setRoles(['ROLE_USER']);

            $user->setPassword(
                $passwordEncoder->hashPassword($user, $form->get('password')->getData())
            );

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Inscription réussie !');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('sign/sign.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
