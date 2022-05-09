<?php

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}

$action = $_REQUEST["action"];

switch ($action) {
    case 'transfert':
        //chargement de la page d'ajout ou de transfert de lot
        include 'controleurs/controleurs_MSL/C_msl_transfert.php';
        break;
    case 'creation' :
        include 'controleurs/controleurs_MSL/C_creation_lot.php';
        break;
    case "verification_lot":
        include 'controleurs/controleurs_MSL/C_verification_msl.php';
        break;
    default :
        //chargement de la page d'ajout ou de transfert de lot
        include 'vues/vues_MSl/V_verification_identifiant.php';
        break;
}
?>

