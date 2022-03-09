<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

class LuckyController extends AbstractController
{
    /**
     * @Route("/hello", name="hello")
     */
    public function hello(){
        echo "hello redirect demo router";
    }

    /**
     * @Route("/luckynumber/number/{max}")
     */
    public function number(int $max, LoggerInterface $logger): Response
    {
        $logger->info('We are logging!');
        exit;
        // ...
    }

    /**
     * @Route("/show")
     */
    public function index(Request $request, string $firstName, string $lastName): Response
    {
    $page = $request->query->get($firstName);
    echo "$page";
        exit;
    // ...
    }
}
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// // ...

// public function index(Request $request, string $firstName, string $lastName): Response
// {
//     $page = $request->query->get('page', 1);

//     // ...
// }
?>