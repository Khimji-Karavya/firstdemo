<?php
namespace App\Controller;
// namespace App\Service;

use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Psr\Log\LoggerInterface;
use App\Entity\BlogPost;

class UserController extends AbstractController
{
    // private $twig;

    /**
     * @Route("/blogg/{slug}", name="blogg_show")
     */
    public function show111($slug): Response
    {
        echo $slug;exit;
        // $post is the object whose slug matches the routing parameter

        // ...
    }
    public function __construct(Environment $twig)
    {
        $loader = $twig->getLoader();
    }
    /**
     * @Route("/constructxyz/{page<\d+>}")
     */
    public function someMethod(int $page): Response
    {   echo $page;
        // ...
        $product = $page;
    if (!$product) {
        $msg = $this->createNotFoundException('The product does not exist*****');
        echo '<pre>'; print_r($msg); exit;
        // the above is just a shortcut for:
        // throw new NotFoundHttpException('The product does not exist');
    }
    exit;
        // $htmlContents = $this->twig->render('user/index.html.twig', [
        //     'category' => 'hr',
        //     'promotions' => ['promotion', 'hr manager'],
        // ]);
    }
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        $userFirstName = "kishan";
        $userNotification = ['hello' => 'how are you '.$userFirstName];

        return $this->render('user/index.html.twig', [
            'userFirstName' => $userFirstName,
            'userNotification' => $userNotification
        ]);
    }
  /**
     * @Route("/", name="blog_index")
     */
    public function index8(): Response
    {
        echo "hello home page";
        return $this->render('/blog/index.html.twig');
       
    }

    /**
     * @Route("/article/{slug}", name="blog_post")
     */
    public function show(string $slug): Response
    {
        echo $slug;
        echo $projectDir = $this->getParameter('kernel.project_dir');
       echo  $adminEmail = $this->getParameter('app.admin_email');

        exit;
    }
    /**
     * @Route("/user4", name = "user4")
     */ 
    public function index3(): Response
    {
        $contact = $this->render('/user/index.html.twig');
        print_r($contact);
        return new Response($contact);

    }

    /**
     * @Route("/email", name = "email")
     */
    public function index9(): Response
    {
        $loader = $this->get('twig')->getLoader();
        echo "<pre>";
        print_r($loader);
        echo "</pre>";
        // in a service using autowiring
        
        if ($loader->exists('user/inde.html.twig')) {
            // the template exists, do something
            // ...
            echo "tamplate olready exist!";
        } else {
            echo "tamolate note exist!";
        }
        exit;
    }
    /**
     * @Route("/dump/{max}", name = "dump")
     */
  
    public function recentArticles(int $max): Response
    {   
        // get the recent articles somehow (e.g. making a database query)
        $articles = ["kishan", 2, 3];
        // echo $max;
        // echo '<pre>'; print_r($articles); exit;
        return $this->render('user/index.html.twig', [
            'articles' => $articles,
            'max' => $max
        ],);
    }

     /**
     * @Route("/dumparray", name = "dumparray")
     */
  
    public function recentArticles1(): Response
    {
        $articles = ['fname' => 'kishan', 'lname' => 'bavaliya'];
        // echo '<pre>'; print_r($articles); exit;
        return $this->render('user/index.html.twig',['articles'=>$articles],);
    }

    /**
    * @Route("/service/{max}")
    */
    public function number(int $max, LoggerInterface $logger): Response
    {
        $msg = $logger->info( '');
        // echo '<pre>'; print_r($logger); exit;
        echo $msg;
        exit;   
        // ...
    }

    /**
     * @Route("/confi")
     */
    public function confi(): Response
    {
        $contentsDir = $this->getParameter('kernel.project_dir').'/contents';
        echo $contentsDir;
        exit;
    }

    /**
     * @Route("/json")
     */

    public function jsonindex(): Response
    {
        // returns '{"username":"jane.doe"}' and sets the proper Content-Type header
        echo $this->json(['username' => 'jane.doe']);
        // the shortcut defines three optional arguments
        // return $this->json($data, $status = 200, $headers = [], $context = []);
        echo $this->file('/home/chintan/web/projects/Learning/Kishan/symfony/demoSymfony/templates/user/index.html.twig');
        exit;
    }

        
   
}
