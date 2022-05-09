<!DOCTYPE html>
<!--
-Author :   Hugo HOVHANNESSIAN
-Date :     26 March 2020
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Barec Automatisme</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" 
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>

        <?php
        //demarre une session PHP
        session_start();

        //Permet de charger les fichiers necessaires pour l'accés a la table "utilisateur" de la base de données
        require_once 'passerelles/passerelles_BAREC/Pdo_Connexion.php';
        require_once 'passerelles/passerelles_BAREC/Pdo_Utilisateur.php';
        require_once 'passerelles/passerelles_MSL/Pdo_Armoire.php';
        require_once 'passerelles/passerelles_MSL/Pdo_NiveauMSL.php';
        require_once 'passerelles/passerelles_MSL/Pdo_Lots_PCB_Armoire.php';
        require_once 'passerelles/passerelles_MSL/Pdo_Maintien.php';
        require_once 'passerelles/passerelles_MSL/Pdo_Reference.php';
        require_once 'passerelles/passerelles_MSL/Pdo_Type_Assechage.php';
        require_once 'passerelles/passerelles_MSL/Pdo_Assechage.php';
        

        include 'vues/vues_BAREC/V_nav.php';
        if (!isset($_REQUEST['uc'])) {
            $_REQUEST['uc'] = 'accueil';
        }
        //"index.php" recupere le cas d'utilisation sollicité par l'utilisateur
        $uc = $_REQUEST["uc"];

        switch ($uc) {
            //Oriente vers le controleur "C_authentification.php"
            case "authentification":
                include 'controleurs/controleurs_BAREC/C_authentification.php';
                break;
            case "gestion_msl":
                include 'controleurs/controleurs_MSL/C_gestion_msl.php';
                break;
            case "msl_liste":
                include 'controleurs/controleurs_MSL/C_msl_liste.php';
                break;
            default :
                include 'vues/vues_BAREC/V_accueil.php';
                break;
        }
        ?>

        <!--Liaison avec le kit Fontawesome-->
        <script src="https://kit.fontawesome.com/3295633519.js" crossorigin="anonymous"></script>

        <!--La liaison au Script -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>
