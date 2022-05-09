<?php

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}

//"index.php" recupere le cas d'utilisation (fonctionnalite_publique) sollicité par l'utilisateur
$action = $_REQUEST["action"];

switch ($action) {

    case 'se_connecter':
        include 'vues/vues_BAREC/V_connexion.php';
        break;

    case 'valid_connexion':
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];

        //appel à la passerelle
        $result = Pdo_Utilisateur::getUtilisateur($login, $mdp);
        print_r($result);

        if ($result) {
            $_SESSION['login'] = $result["prenom"]." ".$result["nom"];
            header('Location: index.php');
        } else {
            session_destroy();
            header('Location: index.php');
            include 'vues/V_connexion.php';
        }

        break;
        
    case "creation_compte":
        include 'controleurs/controleurs_BAREC/C_creation_compte.php';
        break;
    
    case "validation":
        include 'controleurs/controleurs_BAREC/C_Validation_creation_compte.php';
        break;
    
    case "se_deconnecter":
        session_destroy();
        header('Location: index.php');
        break;
}
?>

