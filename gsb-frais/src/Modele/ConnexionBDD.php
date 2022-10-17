<?php
namespace App\Modele;
use PDO;
    class ConnexionBDD {

        private static $connexion = null ;
        private static String $serveur='mysql:host=localhost';
        private static String $bdd='dbname=gsb';
        private static String $user='gsbAdmin' ;
        private static String $mdp='gsb1234' ;

        private function __construct(){
            self::$connexion = new PDO(self::$serveur . ';'
                . self::$bdd, self::$user, self::$mdp);
        }
        public static function getConnexion(){
            if(self::$connexion == null){
                new ConnexionBDD();
            }
            return self::$connexion;
        }

    }
?>

