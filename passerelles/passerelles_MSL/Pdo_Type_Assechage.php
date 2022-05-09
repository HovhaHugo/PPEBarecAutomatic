<?php
/** 
 * Classes d'accés aux données
 * Gére la table type_assechage
 */
class Pdo_Type_Assechage{

    /*
     * Recupere le type d'assechage
     * @return Array $type   un tableau vide ou contenant plusieurs lignes
     */
    public static function getType(){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT id_type FROM type_assechage ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $type = $res->fetchAll();
            
            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $type;
            
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Recupere le temps d'assechage en fonction de l'id
     * @return Array $type   un tableau vide ou contenant plusieurs lignes
     */
    public static function getTemps($type){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT duree FROM type_assechage WHERE id_type = '$type'";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $temps = $res->fetchAll();
            
            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $temps;
            
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
}

