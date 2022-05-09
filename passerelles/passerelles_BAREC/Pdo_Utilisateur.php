<?php

/** 
 * Classes d'accés aux données
 * Gére la table utilisateur
 */
class Pdo_Utilisateur{
    /*
     * Obtient l'utilisateur correspondant au login et mots de passe fournis en paramétre
     * @return Array $utilisateur   un tableau vide ou contenant une seule ligne
     */
    public static function getUtilisateur($login, $mdp){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //cryptage de la valeur du mots de passe 
            $mdp = sha1($mdp);
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT nom, prenom FROM utilisateur WHERE login = '$login' and mdp='$mdp' ";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req);
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $utilisateur = $res->fetch(PDO::FETCH_ASSOC);
            
            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $utilisateur; 
            
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
     /*
     * Obtient l'utilisateur correspondant au login et mots de passe fournis en paramétre
     * @return Array $utilisateur   un tableau vide ou contenant une seule ligne
     */
    public static function getLogin(){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //definition de la requete SQL à éxecuter
            $req = "SELECT login FROM utilisateur";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->query($req);
            
            //on recupere le resultat de la requete dans la variable $utilisateur
            $login = $res->fetchAll();
            
            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();
            
            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $login; 
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
    
     /*
     * Créer un utilisateur correspondant au login et mots de passe fournis en paramétre
     */
    public static function setUtilisateur($nom, $prenom, $statut, $login, $mdp){
        try{
            //on recupere une instance de la classe Pdo_Connexion qui etablit une connexion à la base de données
            $objPdo = Pdo_Connexion::getPdoConnexion();
            
            //cryptage de la valeur du mots de passe 
            $mdp = sha1($mdp);
            
            //definition de la requete SQL à éxecuter
            $req = "INSERT INTO utilisateur (login, mdp, nom, prenom, statut) VALUES('$login','$mdp', '$nom', '$prenom', '$statut')";
            
            //demande d'execution de la requete passer en parametre
            $res = $objPdo ->exec($req); 
            return True;
        } catch (Exception $ex) {
            print_r($ex);
            return false;
        }
    }
}
?>
