<?php

namespace App\Controller;

// use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/new_category_form", name="form_category")
     */
    public function index(Request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $category = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
        }
        return $this->render('category/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/selecte_category", name = "selecte_category")
     */

    //  public function selecteCategory(EntityManagerInterface $entityManager): Response
    //  {
    //     $category = $entityManager->getRepository(Category::class)->findAll();
    //     if(!$category){
    //         throw $this->createAccessDeniedException('category not found');
    //     }
    //     return $this->render('Category/index.html.twig', ['category' => $category]);
    // }
}
