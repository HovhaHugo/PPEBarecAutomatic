<?php
/** 
 * Classes d'accés aux données
 * Gére la table maintien
 */
class Pdo_Maintien{
    /*
     * Insert un lot PCB dans maintien
     */
    public static function setMaintien($id, $seuil){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "INSERT INTO maintien (id_lot_maintien, statut, seuil_alarme)"
                    . " VALUES($id,'E', $seuil)";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            return True;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Transfert un lot PCB dans maintien
     */
    public static function setTransfert($id,$today, $statut, $seuil){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            
            //definition de la requete SQL à éxecuter
            $req = "INSERT INTO maintien (id_lot_maintien, date_derniere_sortie, statut, seuil_alarme)"
                    . " VALUES($id,'$today', '$statut', $seuil)";
            	
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            return True;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Recupere tout les lots en Maintien  
     * @return   Un tableau avec une ligne ou vide 
     */
    public static function getLotMaintien(){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT * FROM maintien ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $statutMaintien = $res->fetchAll(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $statutMaintien;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Recupere le satut du lot mis en paramètre 
     * @return   Un tableau avec une ligne ou vide 
     */
    public static function getMaintien($id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT statut, seuil_alarme FROM maintien WHERE id_lot_maintien = '$id' ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $statutMaintien = $res->fetch(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $statutMaintien;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Recupere la date de sortie du lot mis en paramètree
     * @return   Un tableau avec une ligne ou vide 
     */
    public static function getSortieMaintien($id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT date_derniere_sortie, statut FROM maintien WHERE id_lot_maintien = '$id' ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $dateSortie = $res->fetch(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $dateSortie;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
        /*
     * Recupere la date de sortie du lot mis en paramètree
     * @return   Un tableau avec une ligne ou vide 
     */
    public static function getListeMaintien(){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT nom, id_lot, quantite, duree_utilisation_restante, seuil_alarme 
                FROM maintien INNER JOIN lots_pcb_armoire ON lots_pcb_armoire.id_lot = maintien.id_lot_maintien 
                INNER JOIN armoire ON armoire.id = lots_pcb_armoire.armoire 
                WHERE lots_pcb_armoire.duree_utilisation_restante <= maintien.seuil_alarme ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $dateSortie = $res->fetchAll(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $dateSortie;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
 
    /*
     * Mets a jours un lot en Maintien pas encore sortie
     */
    public static function updateMaintien($statut,$date, $id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "UPDATE maintien SET statut = '$statut', date_derniere_sortie = '$date' WHERE id_lot_maintien = $id ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return true;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Mets a jours un lot en Maintien sorti
     */
    public static function updateMaintienSorti($statut, $id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "UPDATE maintien SET statut = '$statut' WHERE id_lot_maintien = $id";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return true;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Supprime un lot PCB en fonction de l'id
     */
    public static function deleteMaintien($id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "DELETE FROM `maintien` WHERE id_lot_maintien = '$id'";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            
            return True;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
}

