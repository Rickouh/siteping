<?php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PagesController{

    /**
     * @Route("/")
     * @param Environment $twig
     * @return Response
     */
    function index (Environment $twig) {
        return new Response($twig->render('pages/welcome.html.twig'));
    }

}