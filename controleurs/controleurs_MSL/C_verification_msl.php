<?php

$id = $_POST['id'];
$_SESSION['id'] = $id;
$today = date("Y-m-d H:m:s");

$verification = Pdo_Lots_PCB_Armoire::getLot($id);

//On verifie que le lot est bien dans l'assechage ou dans maintiens
$verifAssechage = Pdo_Assechage::getIdAssechage($id);

//Requète pour les pages 
//On recupere la reference Barec
$refBarec = Pdo_Reference::getReference();

//On recupere les id et noms des armoires
$armoire = Pdo_Armoire::getArmoire();

//On recupere le typr d'assechage
$assechage = Pdo_Type_Assechage::getType();

//On recupere le numero du niveau MSL
$msl = Pdo_NiveauMSL::getNiveauMSL();

//on recupere la date de sorit du lot en maintien 
$dateSortie = Pdo_Maintien::getSortieMaintien($id);
$dateSortieLots = $dateSortie["date_derniere_sortie"];
$statut = $dateSortie["statut"];

if ($verification) {  
    //Si l'utilisateur veux mettre le lot 
    if ($verifAssechage) {

        $dateDispo = $verifAssechage["date_dispo"];

        if ($dateDispo < $today) {
            include 'vues/vues_MSL/V_msl_transfert_assechage.php';
        } else {
            echo "Le lot n'a pas fini de sécher,il finira le '$dateDispo' et nous somme le '$today' nous ne pouvons donc pas le déplacer";
        }
    } else {
        if (($dateSortie or $dateSortie < $today) and $statut == "S") {
            include 'vues/vues_MSL/V_msl_transfert_maintien_sorti.php';
        } else {
            include 'vues/vues_MSL/V_msl_transfert_maintien.php';
        }
    }
} else {
    include 'vues/vues_MSL/V_msl_Ajout.php';
}
?>

