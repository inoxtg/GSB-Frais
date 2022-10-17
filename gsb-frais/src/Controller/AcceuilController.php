<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AcceuilController extends AbstractController
{
    public function index(Request $request): Response
    {
        return $this->render('acceuil\acceuil.html.twig',
        [
            'controller' => 'Acceuil\AcceuilController',
        ]
        );
    }
}

?>