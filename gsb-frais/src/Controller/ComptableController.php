<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Modele;
use App\Technique;

class ComptableController extends AbstractController
{
    public function login(Request $request)
    {

        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];

        if(Technique\regLettreChiffreOnly($identifiant) & Technique\regLettreChiffreOnly($password)){
            $comptable = Modele\loginVisiteur($identifiant, $password);
        }else{
            $this->addFlash(
                'fail_pssd_comptable', 'Identifiant ou mot de passe invalide REGEX'

            );
            return $this->redirectToRoute('accueil');
        }
        if($comptable != null)
        {
            $session = $request->getSession();
            $session->set("id",$comptable[0]['idComptable']);
            $session->set("nom",$comptable[0]['nom']);
            $session->set("prenom",$comptable[0]['prenom']);
            $session->set("login",$comptable[0]['login']);
            $session->set("adresse",$comptable[0]['adresse']);
            $session->set("codePostal",$comptable[0]['cp']);
            $session->set("ville",$comptable[0]['ville']);
            $session->set("dateEmbauche",$comptable[0]['dateEmbauche']);
            return $this->redirectToRoute('comptable_frais');
        }

        $this->addFlash(
            'fail_pssd_comptable', 'Identifiant ou mot de passe invalide'
        );
        return $this->redirectToRoute('accueil');
    }

    public function fiche(): Response // change func name
    {
        return $this->render('/comptable/vueFiches.html.twig',
        [
            'controller' => 'ComptableController::fiche', // change func name
        ]
        );
    }

}

?>