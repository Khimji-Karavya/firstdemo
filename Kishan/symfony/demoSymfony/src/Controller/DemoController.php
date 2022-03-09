<?php

namespace App\Controller;

use App\Entity\Product;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo", name="demo")
     */
    public function index(): Response
    {
        echo "demo redirect";exit;
    }

    /**
     * @Route("/demo_redirect", name="demo2")
     */
    public function new(): Response
    {
        return $this->redirectToRoute('demo', []);
        echo "hello";exit;
    }

     /**
     * @Route("/demo_show", name="show")
     */
    public function show(): Response
    {
        
        return $this->redirectToRoute('demo2');

    exit;
        // return $this->redirectToRoute($request->attributes->get('newnumber'));

    }

    /**
     * @Route("/demo_number/{max}", name="number")
     */
    public function number(int $max, LoggerInterface $logger): Response
    {
        $logger->info('We are logging!');
        exit;
        // ...
    }
    /**
     *@Route("/session")
     */
    public function index1(SessionInterface $session): Response
    {
        // stores an attribute for reuse during a later user request
        $session->set('fname', 'bavaliya');
        $session->set('lname', 'kihan');

        // gets the attribute set by another controller in another request
         $foobar = $session->get('fname');

        // uses a default value if the attribute doesn't exist
         $filters = $session->get('lname');
        echo $filters;
        $foobar;
        exit;
        // ...
    }

    /**
     *@Route("/flash/{num}", name = "flash")
     */
    public function update(Request $request, int $num): Response
    {
    
        if ($num > 0) {
            // do some sort of processing
            echo "lash run";
            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );
            $this->addFlash(
                'worning',
                'error in data enter!'
            );
    
            // return $this->redirectToRoute("");
        }
    
        return $this->render('blog/index.html.twig');
        exit;
    }
    /**
     *@Route("/throw")
     */
    public function index3(): Response
    {
    // retrieve the object from database
    $product = "kishan";
    if (!$product) {
        throw $this->createNotFoundException('The product does not exist');

        // the above is just a shortcut for:
        // throw new NotFoundHttpException('The product does not exist');
    }

    return $this->render("");
    }
    /**
     *@Route("/request/response")
     */
    public function index5(Request $request): Response
    {
        // echo $request->isXmlHttpRequest(); // is it an Ajax request?

        // echo $request->getPreferredLanguage(['en', 'fr']);

        // retrieves GET and POST variables respectively
        // echo $request->query->get('id');
        echo $request->request->get('flash');

        // retrieves SERVER variables
        // echo $request->server->get('HTTP_HOST');

        // retrieves an instance of UploadedFile identified by foo
        // echo $request->files->get('fname');

        // retrieves a COOKIE value
    //  echo $request->cookies->get('PHPSESSID');

        // retrieves an HTTP request header, with normalized, lowercase keys
        echo $request->headers->get('host');
        echo $request->headers->get('content-type');

        
        exit;
    }
     /**
     *@Route("/request")
     */
    public function index6(Request $request): Response
    {
        $name = "kishan";
   echo $response = new Response('Hello '.$name, Response::HTTP_OK);

    // creates a CSS-response with a 200 status code
    $response = new Response('<style> ... </style>');
    $response->headers->set('Content-Type', 'text/css');
        exit;
    }

    /**
     * @Route("/cofiguration")
     */
    // ...
    public function index8(): Response
    {
        // echo $contentsDir = $this->getParameter('kernel.project_dir').'/kishan/xyz';
        
        echo $this->json($name = ['fname'=>'kishan']);
        exit;
        // ...
    }

    /**
     * @Route("/streaming/file")
     */
    public function download(): Response
    {
        // send the file contents and force the browser to download it
        echo $this->file('/home/chintan/web/projects/Learning/Kishan/symfony/demoSymfony/public/index.php');
        echo "<br>".$this->json($name = ['fname'=>'kishan']);

        exit;
    }

    /**
     *@Route("/demo/template") 
    */
    public function template(): Response
    {   $product = ['title'=>'<i>hello</i>'];
        return $this->render('demo/base.html.twig',['product'=>$product]);
    }
    /**
     * @Route("/Homepage", name="Homepage")
     */
    public function homepage()
    {
        echo "welcome home page";
        exit;
    }

    /**
     * @Route("/Dashboard", name="Dashboard")
     */
    public function dashboard()
    {
        echo "welcome home page";
        exit;
    }

    /**
     * @Route("/Service", name="Service")
     */
    public function service()
    {
        echo "welcome home page";
        exit;
    }

    
}
