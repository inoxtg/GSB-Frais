<?php

namespace App\Controller;


use PhpParser\Node\Expr\Cast\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Modele;
use App\Technique;
use Symfony\Component\Validator\Constraints\Length;

class VisiteurController extends AbstractController
{
    public function login(Request $request){

        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
        if(Technique\regLettreChiffreOnly($identifiant) & Technique\regLettreChiffreOnly($password)){
            $visiteur = Modele\loginVisiteur($identifiant, $password);
        }else{
            $this->addFlash(
                'fail_pssd_visiteur', 'Identifiant ou mot de passe invalide REGEX'

            );
            return $this->redirectToRoute('accueil');
        }

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
    
    public function historique(Request $request): Response
    {

        $session = $request->getSession();
        $fichesFrais = Modele\getAllFicheFraisForVisiteur($session->get("id"));

        foreach($fichesFrais as $index=>$uneFiche)
        {
            $fichesFrais[$index]["lignesFraisForfait"] = Modele\getLigneFraisForfait($uneFiche["idVisiteur"], $uneFiche["mois"]);
            
            foreach($fichesFrais[$index]["lignesFraisForfait"] as $ligneIndex=>$lignesFraisForfait)
            {
                $fichesFrais[$index]["lignesFraisForfait"][$ligneIndex]["fraisForfaitLibelle"] = Modele\getLibelleFraisForfaitById($fichesFrais[$index]["lignesFraisForfait"][$ligneIndex]["idFraisForfait"])[0]["libelle"];
            }
        }

        //print("<pre>".print_r($fichesFrais,true)."</pre>");

        return $this->render('/visiteur/vueHistorique.html.twig',
        [
            'controller' => 'VisiteurController::historique',
            'fichesFrais' => $fichesFrais,
        ]
        );
    }

    public function page_frais(Request $request): Response
    {

        $date = date('Y-m');
        $idsTable = Modele\getIdFicheFraisMauvaisEtat($date);

        //Automatisation etat "saisie en cours" >>>>>>>>>>> "saisie terminée" tous les mois :)
        foreach ( $idsTable as $ids){
            foreach( $ids as $id ){
                Modele\modifierEtatVisiteurFicheFrais($id);
            }
        }

        $session = $request->getSession();

        $fraisForfait = Modele\getFraisForfait();
        $ligneFraisForfait = Modele\getLigneFraisForfait($session->get("id"), $date);
        $ligneFraisHorsForfait = Modele\getLigneHorsForfaitAndFicheFrais($session->get("id"), $date);

        return $this->render('visiteur\vueFiche.html.twig',
        [
            'controller' => 'VisiteurController::page_frais',
            'fraisForfait' => $fraisForfait,
            'ligneFraisForfait' => $ligneFraisForfait,
            'ligneFraisHorsForfait' => $ligneFraisHorsForfait,
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

        Modele\RemoveAllLigneFraisHorsForfait($session->get("id"), date('Y-m'));


        $listLibelle = array();
        if(!empty($_POST["frais_hors_forfait"]))
        {        
            foreach($_POST["frais_hors_forfait"] as $index=>$fraisHorsForfait)
            {
                if( !in_array($fraisHorsForfait["libelle"], $listLibelle) && strlen($fraisHorsForfait["libelle"]) !== 0) // unique libelle
                {
                    array_push($listLibelle, $fraisHorsForfait["libelle"]);
                
                    Modele\createLigneHorsForfait($session->get("id"), date('Y-m'), $fraisHorsForfait["libelle"], $fraisHorsForfait["input"], $fraisHorsForfait["date"]);
            
                }
            }
        }
        return $this->redirectToRoute('visiteur_frais');
    }
}

?>