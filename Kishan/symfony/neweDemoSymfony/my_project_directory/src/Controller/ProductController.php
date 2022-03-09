<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;   
use App\Form\ProductType;


class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="app_product")
     */
    public function index(EntityManagerInterface $entityManager, ValidatorInterface $validator, int $id): Response
    {
        $category = $this->getDoctrine()->getRepository(Category ::class)->find($id);

        if(!$category){
            throw $this->createNotFoundException('this category id not fount '.$id);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $product = new Product();
        $product->setName('watch');
        $product->setPrice(199);
        $product->setDiscription('Ergonomic and st');
        $product->setTitle('');
        $product->setCategory($category);
        $date = date('d-m-Y');
        $product->setDate(\DateTime::createFromFormat('d-m-Y',$date));
        $product->setState('DZ');
        $errors = $validator->validate($product);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
            
        }
        

        $entityManager->persist($product);

        $entityManager->flush();

        return new Response('save new product with id '.$product->getId());
    }

    /**
     * @Route("/product/show/{id}", name="product_show")
     */
    public function show(int $id): Response
    {   
        //show url get id in product name
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if(!$product){
            throw $this->createNotFoundException('no fount product id '.$id);
        }
        
        return new Response('check out this product '.$product->getName());
    }

    /**
     * @Route("/product/all/show", name="product_new")
     */
    public function new(ProductRepository $repository): Response
    {
        $product = $repository->findAll();

        if(!$product)
        {
            throw $this->createNotFoundException('no found product');
        }
        
        foreach($product as $k => $pro){
            echo $pro->getId()."/".$pro->getName()."/".$pro->getPrice()."/  ".$pro->getDiscription()."/".$pro->getCategory()->getName();
        echo "<br>";
        } 
        exit;
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(EntityManagerInterface $entityManager, int $id ): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(product::class)->find($id);

        $product->setName('watch');
        $product->setPrice(100);
        $product->setDiscription('watch in women');

        $entityManager->persist($product);

        $entityManager->flush();

        return $this->redirectToRoute('product_show', ['id'=>$product->getId()]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(EntityManagerInterface $entityManager, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(product::class)->find($id);

        // $product = $repository->find($id);

        if(!$product){
            throw $this->createNotFoundException('not found id '.$id);
        }
        $entityManager->remove($product);
        $entityManager->flush();
        return new Response('delete this record id '.$id);
    }

    /**
     * @Route("/product_form", name="product_form")
     */
    public function productForm(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) { 
            $product = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($product);
            $entityManager->flush();
            return new Response('Product sucssesfully add id '.$product->getId());
        }
        return $this->render('product/index.html.twig', ['form' => $form->createView()]);

    }

}
