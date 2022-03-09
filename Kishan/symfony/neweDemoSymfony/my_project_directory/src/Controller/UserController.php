<?php

namespace App\Controller;

use App\Entity\Education;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;   



class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(Request $request): Response
    {
        $education = new Education();
        $user = new User();
        $user->addEducation($education);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($user);
            $entityManager->persist($education);
            $entityManager->flush();
            return new Response('user sucssesfully add id '.$user->getId());
        }
        
        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),

        ]);
        
    }
}
