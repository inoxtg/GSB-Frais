<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Modele;

class ComptableController extends AbstractController
{
    public function login()
    {

        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];

        if(Modele\loginComptable($identifiant, $password))
        {
            return $this->redirectToRoute('comptable_frais');
        }

        $this->addFlash(
            'fail_pssd_comptable', 'Identifiant ou mot de passe invalide'
        );
        return $this->redirectToRoute('accueil');
    }

    public function fiche(): Response // change func name
    {
        return $this->render('/comptable/vueFiche.html.twig', // set vue
        [
            'controller' => 'ComptableController::fiche', // change func name
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