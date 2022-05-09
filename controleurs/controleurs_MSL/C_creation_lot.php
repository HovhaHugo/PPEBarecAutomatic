<?php

//Declaration et instanciation des variables
$refBarec = $_POST['refBarec'];
$qtePCB = $_POST['qteLot'];
$niveauMsl = $_POST['niveauMSL'];
$armoire = $_POST['armoire'];
$section = $_POST['section'];
$today = date("y-m-d H:m:s");

$duree = Pdo_NiveauMSL::getDureeRestante($niveauMsl);

foreach ($duree as $uneDuree) {
    $dureeRestante = $uneDuree['temps'];
}
//Création du lot dans la table lots_pcb_armoire
$lot = Pdo_Lots_PCB_Armoire::setLot($_SESSION["id"], $refBarec, $today, $qtePCB, $armoire, $niveauMsl, $dureeRestante);

//si l'utilisateur créer un lot dans maintien alors on ajoute se lots dans la base maintien
if ($section == "Maintien") {

    $seuil = $_POST["seuil"];

    //Creation du lot dans la table maintien
    $lotMaintien = Pdo_Maintien::setMaintien($_SESSION["id"], $seuil);

    if ($lot == TRUE && $lotMaintien == TRUE) {
        echo "L'insertion c'est bien passé";
    }
//sinon l'utilisateur créer un lot dans assechage
} else {

    $dureeAssechage = $_POST["dureeAssechage"];
    $typeAssechage = $_POST["typeAssechage"];

    //On augmente la date du jour avec la durée d'assechage
    $dateDispo = date("y-m-d H:m:s", strtotime('now +' . $dureeAssechage . ' Hour'));

    //Creation du lot dans la table assechage
    $lotAssechage = Pdo_Assechage::setAssechage($today, $dureeAssechage, $dateDispo, $_SESSION["id"], $typeAssechage);
}
?>

