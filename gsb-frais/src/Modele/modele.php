<?php

namespace App\Modele;
use PDOException;
require_once("ConnexionBDD.php");

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
/*------------------------------VISITEUR------------------------------*/
/*
 RECUPERATION TOUS LES VISITEURS
 */
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
/*
 CONNEXION VISITEUR, RETURN VISITEUR
 */
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
/*
 FICHE FRAIS EXISTE ??
 */
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
/*
 FICHE FRAIS CREATION
 */
function createFicheFraisForVisiteurAndMois($idVisiteur, $mois){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $query = "INSERT INTO `FicheFrais` (`idVisiteur`,`mois`,`nbJustificatifs`,`montantValide`,`idEtat`,`idComptable`) "
            ."VALUES (:visiteur, :mois, 0, 0, 1, 1) ";
        $create = $connexion->prepare($query);
        $create->execute(array(
            ':visiteur' => $idVisiteur,
            ':mois' => $mois
        ));
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
/*
 RECUPERATION FICHEFRAIS FOR VISITEUR AND MOIS
 */
function getFicheFraisForVisiteurAndMois($idvisiteur, $mois){
    try{
        if(existsFicheFraisForVisiteurAndMois($idvisiteur, $mois) == 1 ){
            $connexion = ConnexionBDD::getConnexion();
            $query = "SELECT * FROM FicheFrais "
                ."WHERE `idVisiteur` = :idVisiteur "
                ."AND `mois` = :mois ";
            $ficheFrais = $connexion->prepare($query);
            $ficheFrais->execute(array(
                ":idVisiteur" => $idvisiteur,
                ":mois" => $mois
            ));
            $ficheFraisFetch = $ficheFrais->fetchAll();
            return $ficheFraisFetch;
        }else{
            createFicheFraisForVisiteurAndMois($idvisiteur, $mois);
            return getFicheFraisForVisiteurAndMois($idvisiteur, $mois);
        }
    }catch(PDOException $e){
        $e->getMessage();
    }
}
/*
 CREATION LIGNEFRAISFORFAIT POUR CHAQUE FRAISFORFAIT SUR UNE FICHEFRAIS INNITIALISE A 0
 */
function createLigneFraisForfaitForFicheFrais($idFicheFrais){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $fraisForfait = getFraisForfait();
        $query = "INSERT INTO `LigneFraisForfait` "
            ."(`idFicheFrais`,`idFraisForfait`,`quantite`) "
            ."VALUES (:idFicheFrais, :idFraisForfait, 0) ";
        $create = $connexion->prepare($query);
        foreach($fraisForfait as $fftable){
            $create->execute(array(
                ":idFicheFrais" => $idFicheFrais,
                ":idFraisForfait" => $fftable['idFraisForfait']
            ));
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
/*
 <RECUPERATION LIGNEFRAISFORFAIT :
        LIGNEFRAISFORFAIT EXISTE ???????????>
            SI NON CREATION
 */
function getLigneFraisForfait($idVisiteur, $mois){
    try{
        $connexion = ConnexionBDD::getConnexion();
        if(existsFicheFraisForVisiteurAndMois($idVisiteur, $mois) == 1){
            $ficheFrais = getFicheFraisForVisiteurAndMois($idVisiteur, $mois);
            $idFicheFrais = $ficheFrais[0]['idFicheFrais'];
            $query = "SELECT * FROM LigneFraisForfait "
                ."WHERE idFicheFrais = :idFicheFrais ";
            $ligneFraisForfait = $connexion->prepare($query);
            $ligneFraisForfait->execute(array(
            ":idFicheFrais" => $idFicheFrais
            ));
            $ligneFraisForfaitFecth = $ligneFraisForfait->fetchAll();
            if(count($ligneFraisForfaitFecth) >= 1){
                return $ligneFraisForfaitFecth;
            }else{
                createLigneFraisForfaitForFicheFrais($idFicheFrais);
                return getLigneFraisForfait($idVisiteur, $mois);
            }
        }else{
            createFicheFraisForVisiteurAndMois($idVisiteur, $mois);
            return getLigneFraisForfait($idVisiteur, $mois);
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
/*
 MODIFICATION LIGNEFRAISFORFAIT !!!!!!!!!!!!!!!!!
 */
function modifierLigneFraisForfait($idvisiteur, $mois, $idFraisForfait, $quantite){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $ficheFrais = getFicheFraisForVisiteurAndMois($idvisiteur, $mois);
        $idFicheFrais = $ficheFrais[0]['idFicheFrais'];
        $query = "UPDATE `LigneFraisForfait` "
                ."SET `quantite` = :quantite "
                ."WHERE `idFicheFrais` = :idFicheFrais "
                ."AND `idFraisForfait` = :idFraisForfait ";
        $modifier = $connexion->prepare($query);
        $modifier->execute(array(
            ":quantite" => $quantite,
            ":idFicheFrais" => $idFicheFrais,
            ":idFraisForfait" => $idFraisForfait
        ));
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
/*
 RECUPERATION LIGNES HORS FORFAIT FOR VISITEUR AND MOIS
 */
function getLigneHorsForfaitAndFicheFraisForVisiteurAndMois($idVisiteur, $mois){
    try{
        $connexion = ConnexionBDD::getConnexion();
        if(existsFicheFraisForVisiteurAndMois($idVisiteur, $mois)){
            $query = "SELECT * FROM LigneFraisHorsForfait AS lfhf "
                    ."JOIN FicheFrais AS ff "
                    ."ON ff.idFicheFrais = lfhf.idFicheFrais "
                    ."WHERE ff.mois = :mois AND ff.idVisiteur = :visiteur ";
            $ligneFraisHorsForfait = $connexion->prepare($query);
            $ligneFraisHorsForfait->execute(array(
                ":visiteur" => $idVisiteur,
                ":mois" => $mois
            ));
            $ligneFraisHorsForfaitFecth = $ligneFraisHorsForfait->fetchAll();
            return $ligneFraisHorsForfaitFecth;
        }else{
            createFicheFraisForVisiteurAndMois($idVisiteur, $mois);
            return getLigneHorsForfaitAndFicheFraisForVisiteurAndMois($idVisiteur, $mois);
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
/*
 CREATION LIGNE FRAIS HORS FORFAIT
 */
function createLigneHorsForfait($idVisiteur, $mois, $libelle, $montant, $date){
    try{
        $connexion = ConnexionBDD::getConnexion();
        $ficheFrais = getFicheFraisForVisiteurAndMois($idVisiteur, $mois);
        $idFicheFrais = $ficheFrais[0]['idFicheFrais'];

    }catch (PDOException $e){
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
            return $comptableFetch;
        }else{
            return null;
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
echo var_dump(getLigneFraisForfait(2,'2022-11'));
?>