<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class BlogControllerlist extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function list(): Response
    {
        // generate a URL with no route arguments
        // $signUpPage = $this->generateUrl('newnumber');
        // echo  $signUpPage;
        // generate a URL with route arguments
            $userProfilePage = $this->generateUrl('lucky', [
            'username' => $user->getUsername(),
        ]);
        echo $userProfilePage;

        // generated URLs are "absolute paths" by default. Pass a third optional
        // argument to generate different URLs (e.g. an "absolute URL")
        $signUpPage = $this->generateUrl('newnumber', [], UrlGeneratorInterface::ABSOLUTE_URL);
        echo $signUpPage."<br>";
        // when a route is localized, Symfony uses by default the current request locale
        // pass a different '_locale' value if you want to set the locale explicitly
        $signUpPageInDutch = $this->generateUrl('newnumber', ['_locale' => 'nl']);
        echo $signUpPageInDutch;
        exit;
        // ...
    }
}
?>