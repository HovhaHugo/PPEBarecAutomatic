<?php
/** 
 * Classes d'accés aux données
 * Gére la table lots_pcb_armoire
 */
class Pdo_Assechage{

    /*
     * Créer un lot PCB avec les informations saisie par l'utilisateur
     */
    public static function setAssechage($today, $dureeAssechage, $dateDispo, $id, $typeAssechage){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "INSERT INTO assechage (date_mise_etuve, duree_assechage, date_dispo, id_lot_assechage, type_assechage)"
                    . " VALUES('$today', '$dureeAssechage', '$dateDispo', $id, '$typeAssechage')";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            return True;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }

    /*
     * Supprime un lot PCB en fonction de l'id
     */
    public static function deleteAssechage($id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "DELETE FROM `assechage` WHERE id_lot_assechage = '$id'";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            
            return True;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Verifie si l'identifiant est dans la table assechage
     * @return   Un tableau avec une ligne ou vide 
     */
    public static function getIdAssechage($id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT id_lot_assechage, date_dispo FROM assechage WHERE id_lot_assechage = '$id' ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $lotAssechage = $res->fetch(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $lotAssechage;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    /*
     * Recupere les lots prêt a sortir
     * @return   Un tableau avec une ligne ou vide 
     */
    public static function getAssechagePretSortie($today){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT nom, id_lot, quantite, date_dispo 
                    FROM assechage INNER JOIN lots_pcb_armoire ON lots_pcb_armoire.id_lot = assechage.id_lot_assechage
                    INNER JOIN armoire ON armoire.id = lots_pcb_armoire.armoire 
                    WHERE date_dispo < '$today'";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $lotAssechage = $res->fetchAll(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $lotAssechage;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
}

