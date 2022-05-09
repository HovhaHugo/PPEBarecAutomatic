<?php

/** 
 * Classes d'accés aux données
 * Gére la table niveau_msl
 */
class Pdo_NiveauMSL{
    /*
     * Obtient la liste des niveau MSL
     * @return Array $msl   un tableau vide ou contenant plusieurs lignes
     */
    public static function getNiveauMSL(){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT id_msl FROM niveau_msl ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req);
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $msl = $res->fetchAll();
            
            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $msl; 
            
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Obtient le temps d'un niveau msl
     * @return Array $duree   un tableau vide ou contenant une ligne
     */
    public static function getDureeRestante($msl){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT temps FROM niveau_msl WHERE id_msl = '$msl'";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
                        //on recupere le resultat de la requete dans la variable $utilisateur
            $duree = $res->fetchAll();
            
            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $duree;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
}
 ?>