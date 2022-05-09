<?php

/** 
 * Classes d'accés aux données
 * Gére la table reference
 */
class Pdo_Reference{
    /*
     * Obtient la liste des armoires
     * @return Array $armoire   un tableau vide ou contenant une plusieurs lignes
     */
    public static function getReference(){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT id_ref FROM reference ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req);
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $reference = $res->fetchAll();
            
            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $reference; 
            
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
}