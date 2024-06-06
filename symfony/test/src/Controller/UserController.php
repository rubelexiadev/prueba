<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route("/users/0")]
    public function new(Request $request): Response
    {
        $user = new User();
        $user->setUsername("rubelexia");
        $user->setEmail("rubennnda@gmail.com");

        $form = $this->createFormBuilder($user)
            ->add("username", TextType::class)
            ->add("email", TextType::class)
            ->add("save", SubmitType::class, ["label" => "Crear usuario"])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            return $this->redirectToRoute("greeting", array("name" => $user->getUsername()));
        }

        return $this->render('user/new.html.twig', [
            'form' => $form,
        ]);
    }
}