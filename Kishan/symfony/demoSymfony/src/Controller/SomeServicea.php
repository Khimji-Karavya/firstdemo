<?php
namespace App\Service;
namespace App\Controller;


use Twig\Environment;

class SomeServicea
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function someMethod()
    {
        /**
         * @Route("/construction")
         */ 
        $htmlContents = $this->twig->render('user/index.html.twig', [
            'category' => 'hr',
            'promotions' => ['h'=>'promotion'],
        ]);
    }
}
?>