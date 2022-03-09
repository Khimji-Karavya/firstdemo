<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog_post", name="blog_post")
     */
    public function index(): Response
    {   
        echo "hello include file ";
        exit;
       // renders templates/lucky/number.html.twig
return $this->render('blog/index.html.twig', ['number' => 200]);
    }
}
