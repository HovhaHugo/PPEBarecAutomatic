<?php
/** 
 * Classes d'accés aux données
 * Gére la table lots_pcb_armoire
 */
class Pdo_Lots_PCB_Armoire{

    /*
     * Créer un lot PCB avec les informations saisie par l'utilisateur
     */
    public static function setLot($id,$ref, $date, $quantite, $armoire, $msl, $dureeRestante){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "INSERT INTO lots_pcb_armoire (id_lot, ref, date_ouverture, quantite, armoire, niveau_msl, duree_utilisation_restante)"
                    . " VALUES($id, '$ref', '$date', $quantite, $armoire, '$msl', $dureeRestante)";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            return True;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
     /*
     * Recupere l'identifiant du dernier lot
     */
    public static function getIdentifiant(){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT id_lot FROM lots_pcb_armoire WHERE id_lot >= (SELECT max(id_lot) FROM lots_pcb_armoire) ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $identifiant = $res->fetchAll(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $identifiant;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
        
    /*
     * Verifie si le lots existe déjà ou pas et recupere la durée d'utilisation restante
     */
    public static function getLot($id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT id_lot, duree_utilisation_restante FROM lots_pcb_armoire WHERE id_lot = '$id' ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $identifiant = $res->fetch(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $identifiant; 
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    /*
     * Récupere les lots de la table PCB
     */
    public static function getLotPCB(){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT * FROM lots_pcb_armoire ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $identifiant = $res->fetchAll(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $identifiant; 
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
     
    /*
     * Recupere le niveau MSL du lot PCB
     * @return  Un tableau avec un ligne ou vide
     */
    public static function getNiveauMSL($id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT niveau_msl FROM lots_pcb_armoire WHERE id_lot = '$id' ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req); 
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $identifiant = $res->fetchAll(PDO::FETCH_ASSOC);
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $identifiant; 
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
    /*
     * Mets à jours le lot PCB
     */
    public static function updateLotPcbArmoire($tempsMsl, $id){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "UPDATE lots_pcb_armoire SET duree_utilisation_restante = '$tempsMsl' WHERE id_lot = $id ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
           
            //retourne 'true' si la mise a jour c'est bien passé 
            return true;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
}