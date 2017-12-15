<?php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class PagesController {

    function index () {
        return new Response('Salut les gens');
    }

}