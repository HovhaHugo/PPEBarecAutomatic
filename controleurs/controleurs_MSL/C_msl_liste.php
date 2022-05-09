<?php
$today = date("Y-m-d");
$assechageSortie = Pdo_Assechage::getAssechagePretSortie($today);

$maintien = Pdo_Maintien::getListeMaintien();

include 'vues/vues_MSL/V_msl_liste.php';
?>

