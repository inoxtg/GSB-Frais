<?php

namespace App\Modele;
use PDOException;
use App\Modele\ConnexionBDD;

require_once("ConnexionBDD.php");


/*------------------------------VISITEUR------------------------------*/
function getVisiteurAll() {
    try{
        $connexion = ConnexionBDD::getConnexion();
        $query = " SELECT * FROM Visiteur ";
        $visiteurs = $connexion->prepare($query);
        $visiteurs->execute();
        $visiteursFetch = $visiteurs->fetchAll();

        unset($visiteurs);
        return $visiteursFetch;
    }catch(PDOException $e){
        die();
        return "BALISE ERREUR" . $e->getMessage();
    }
}
function loginVisiteur($login, $mdp){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $query = "SELECT * FROM Visiteur "
                ."WHERE login = :login AND mdp = :mdp ";
        $visiteur = $connexion->prepare($query);
        $visiteur->execute(array(
            ":login" => $login,
            ":mdp" => $mdp
        ));
        $visiteurFetch = $visiteur->fetchAll();
        if(count($visiteurFetch) == 1 ){
            return $visiteurFetch;
        }else{
            return null;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
function existsFicheFraisForVisiteurAndMois($idVisiteur, $mois){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $query = "SELECT * FROM FicheFrais "
            ."WHERE idVisiteur = :visiteur "
            ."AND mois = :mois ";
        $ficheFrais = $connexion->prepare($query);
        $ficheFrais->execute(array(
            ":visiteur" => $idVisiteur,
            ":mois" => $mois
        ));
        $ficheFraisFetch = $ficheFrais->fetchAll();
        if(count($ficheFraisFetch) == 1){
            return 1;
        }elseif(count($ficheFraisFetch) > 1){
            return -1;
        }else{
            return 0;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
function getLigneFraisForfaitAndFicheFraisForVisiteurAndMois($idVisiteur, $mois){
    try{
        $connexion = ConnexionBDD::getConnexion();
        if(existsFicheFraisForVisiteurAndMois($idVisiteur, $mois) == 1){
            $query = "SELECT * FROM LigneFraisForfait AS lff "
                    ."JOIN FicheFrais AS ff "
                    ."ON ff.idFicheFrais = lff.idFicheFrais "
                    ."WHERE ff.mois = :mois AND ff.idVisiteur = :visiteur ";
            $ligneFraisForfait = $connexion->prepare($query);
            $ligneFraisForfait->execute(array(
                ":visiteur" => $idVisiteur,
                ":mois" => $mois
            ));
            $ligneFraisForfaitFetch = $ligneFraisForfait->fetchAll();
            return $ligneFraisForfaitFetch;
        }else{

            /*---------------MEMO-----------------
            $query = "INSERT INTO FicheFrais"
            return null;
            */
            return null;
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

/*------------------------------COMPTABLE------------------------------*/
function loginComptable($login, $mdp){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $query = "SELECT * FROM Comptable "
            ."WHERE login = :login AND mdp = :mdp ";
        $comptable = $connexion->prepare($query);
        $comptable->execute(array(
            ":login" => $login,
            ":mdp" => $mdp
        ));
        $comptableFetch = $comptable->fetchAll();
        if(count($comptableFetch) == 1 ){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

/*------------------------------FRAISFORFAIT------------------------------*/
function getFraisForfait(){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $query = "SELECT * FROM FraisForfait";
        $fraisForfait = $connexion->prepare($query);
        $fraisForfait->execute();
        $fraisForfaitFetch = $fraisForfait->fetchAll();
        return $fraisForfaitFetch;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>