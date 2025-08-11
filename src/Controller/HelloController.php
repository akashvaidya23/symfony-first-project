<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    #[Route('/')]
    public function index() :Response
    {
        return $this->render('hello/index.html.twig');
        // $contents = $this->renderView('hello/index.html.twig');
        // return new Response($contents);
    }
}