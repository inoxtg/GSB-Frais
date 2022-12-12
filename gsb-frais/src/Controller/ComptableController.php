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
            $comptable = Modele\loginComptable($identifiant, $password);
        }else{
            $this->addFlash(
                'fail_pssd_comptable', 'Caractères invalide'
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

    public function fiches(Request $request): Response
    {
        $fichesFrais = array();
        if ($request->isMethod('post')) {

            $user = $_POST['username'];
            $month = $_POST['month'];

            $select_user = isset($_POST['date_checkbox']);
            $select_month = isset($_POST['username_checkbox']);

            if(var_dump($select_user) && var_dump($select_month))
            {
                $fichesFrais = Modele\getFicheFraisForVisiteurAndMois($user, $month);
            }
            else if(var_dump($select_user))
            {
                $fichesFrais = Modele\getAllFicheFraisForVisiteur($user);
            }
            else if(var_dump($select_month))
            {
                $fichesFrais = Modele\getAllFicheFraisForMois($month);
            }
        }
        
        if(empty($fiches))
        {
            $fichesFrais = Modele\getAllDateVisiteurFicheFrais();
        }

        foreach($fichesFrais as $index=>$uneFiche)
        {
            $fichesFrais[$index]["lignesFraisForfait"] = Modele\getLigneFraisForfait($uneFiche["idVisiteur"], $uneFiche["mois"]);
            
            foreach($fichesFrais[$index]["lignesFraisForfait"] as $ligneIndex=>$lignesFraisForfait)
            {
                $fichesFrais[$index]["lignesFraisForfait"][$ligneIndex]["fraisForfaitLibelle"] = Modele\getLibelleFraisForfaitById($fichesFrais[$index]["lignesFraisForfait"][$ligneIndex]["idFraisForfait"])[0]["libelle"];
            }
        }

        print("<pre>".print_r($fichesFrais,true)."</pre>");

    
        return $this->render('/comptable/vueFiches.html.twig',
        [
            'controller' => 'ComptableController::fiches',
            'fichesFrais' => $fichesFrais,
        ]
        );
    }
}

?>