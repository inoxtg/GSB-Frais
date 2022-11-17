<?php

namespace App\Controller;

use App\Entity\Fraisforfait;
use App\Entity\Lignefraisforfait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Modele;

class VisiteurController extends AbstractController
{
    public function login(Request $request){

        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
        $visiteur = Modele\loginVisiteur($identifiant, $password);

        if($visiteur != null)
        {
            $session = $request->getSession();
            $session->set("id",$visiteur[0]['idVisiteur']);
            $session->set("nom",$visiteur[0]['nom']);
            $session->set("prenom",$visiteur[0]['prenom']);
            $session->set("login",$visiteur[0]['login']);
            $session->set("adresse",$visiteur[0]['adresse']);
            $session->set("codePostal",$visiteur[0]['cp']);
            $session->set("ville",$visiteur[0]['ville']);
            $session->set("dateEmbauche",$visiteur[0]['dateEmbauche']);

            return $this->redirectToRoute('visiteur_frais');
        }

        $this->addFlash(
            'fail_pssd_visiteur', 'Identifiant ou mot de passe invalide'
        );
        return $this->redirectToRoute('accueil');
    }
    
    public function historique(): Response
    {
        // get historique
        return $this->render('/visiteur/vueHistorique.html.twig',
        [
            'controller' => 'VisiteurController::historique',
        ]
        );
    }

    public function page_frais(Request $request): Response
    {

        $session = $request->getSession();

        $fraisForfait = Modele\getFraisForfait();
        $ligneFraisForfait = Modele\getLigneFraisForfait($session->get("id"), date('Y-m'));
        
        return $this->render('visiteur\vueFiche.html.twig',
        [
            'controller' => 'VisiteurController::page_frais',
            'fraisForfait' => $fraisForfait,
            'ligneFraisForfait' => $ligneFraisForfait,
        ]
        );
    }

    public function reception_fiche(Request $request)
    {
        $session = $request->getSession();

        foreach($_POST["frais_forfait"] as $index=>$fraisForfait)
        {
            Modele\modifierLigneFraisForfait($session->get("id"), date('Y-m'), $index,$fraisForfait);
        }
        
        return $this->redirectToRoute('visiteur_frais');
    }
}

?>