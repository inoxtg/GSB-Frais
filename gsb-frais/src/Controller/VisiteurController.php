<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VisiteurController extends AbstractController
{

    public function login()
    {

        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];

        if(true)
        {
            return $this->redirectToRoute('visiteur_frais');
        }

        $this->addFlash(
            'fail_pssd_visiteur', 'Identifiant ou mot de passe invalide'
        );
        return $this->redirectToRoute('index');
    }

    public function fiche(): Response
    {
        return $this->render('/visiteur/vueFiche.html.twig',
        [
            'controller' => 'VisiteurController::fiche',
        ]
        );
    }

    public function historique(): Response
    {
        return $this->render('/visiteur/vueHistorique.html.twig',
        [
            'controller' => 'VisiteurController::historique',
        ]
        );
    }

    public function page_frais(): Response
    {
        return $this->render('visiteur\vueFiche.html.twig',
        [
            'controller' => 'VisiteurController::page_frais',
        ]
        );
    }

}

?>