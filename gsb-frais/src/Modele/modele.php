<?php

namespace App\Modele;
use PDOException;
use App\Modele\ConnexionBDD;

require_once("ConnexionBDD.php");

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
/*------------------------------VISITEUR------------------------------*/
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
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){

    }
}
/*
function getFicheDeFraisForVisiteur($idVisiteur){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $query = " SELECT * FROM Visiteur WHERE login = :login and mdp = :mdp ";
    }catch(PDOException $e){
        die();
        return "BALISE ERREUR CONNEXION" . $e->getMessage();
}
*/

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

    }
}



?>