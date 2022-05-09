<?php

if (!isset($_REQUEST['transf'])) {
    $_REQUEST['transf'] = 'accueil';
}

$transfert = $_REQUEST["transf"];

$id = $_SESSION['id'];
$today = date("Y-m-d");

switch ($transfert) {

    case 'assechage':// Dans le cas d'un lot en maintien 
        
        //On recupere les variables de la page HTML
        $transfertMaintien = $_POST["transfert"];
        $utilisation = $_POST["utilisation"];
        $seuil = $_POST["seuil"];

        if ($utilisation == "Oui") {// Si l'utilisateur veut l'utiliser
            $statut = "S";          // On mets le statut à S
        } else {                    // Sinon ...
            $statut = "E";          // On mets le statut à E
        }
        
        //On effectue les modification necessaire
        $validationTransfert = Pdo_Maintien::setTransfert($id, $today, $statut, $seuil);
        $suppressionAssechage = Pdo_Assechage::deleteAssechage($id);

        //Si tout est bon, on previens l'utilisateur et on change de page au bout dde 10s
        if ($validationTransfert && $suppressionAssechage) {
            echo "Le transfert c'est bien passé";
            header("refresh:10;url=index.php");
        } else {
            echo "Le transfert n'a pas eu lieu, il y a eu un probleme";
            header("refresh:10;url=index.php?uc=transfert_lot&transf=assechage");
        }
        break;

    case 'maintien':// Dans le cas d'un lot en maintien 
    
        //On recupere les variables nécessaires soit 
        $transfertAssechage = $_POST["transfert"];          // la validation du transfert 
        $use = $_POST["utilisation"];                       //La variable contenant Oui ou Non pour l'utilisation
        $type = $_POST["typeAssechage"];                    //Le type d'assechage
        $remise = $_POST["remise"];                         //Le volonté de remttre le lot ou pas 
        $seuilMaintien = Pdo_Maintien::getMaintien($id);    //Le seuil du lot en maintien
        $lot = Pdo_Lots_PCB_Armoire::getLot($id);           

        $tempsPCB = $lot["duree_utilisation_restante"];     //Le temps d'utilisation restante pour le lot 

        if ($use == "Oui") { // Si l'utilisateur veut l'utiliser, on mets juste le satut a S
            if ($seuilMaintien[0]["seuil_alarme"] > $tempsPCB) {
                $modificationMaintien = Pdo_Maintien::updateMaintien("S", $today, $id);

                if ($modificationMaintien) {
                    echo "Le lot a bien été modifier";
                    header("refresh:10;url=index.php");
                }
            }
        } else {// Si l'utilisateur ne veut pas l'utiliser, alors ...
            if ($remise == "Oui") {// Si l'utilisateur veut le remettre en maintien, 
                // on mets le Statut a E et on réinitialise la durée d'utilisation restante
                
                
                $dateMaintien = Pdo_Maintien::getSortieMaintien($id);   //On recupere la date de sortie du lot que l'on mets en Heures
                $dateMaintienSeconde = strtotime($dateMaintien["date_derniere_sortie"]) / 3600;
                $todayBis = strtotime($today) / 3600;   //On mets en heure la date du jour 
                
                if ($dateMaintien != Null) {    //On fait le calcule si il exiqte une date de sortie 
                    $tempsCalculer = $todayBis - $dateMaintienSeconde;
                } else {
                    $tempsCalculer = 0;
                }
                
                //On mets a jour la durée d'utilisation restante 
                $dureeUtilisation = $tempsPCB - $tempsCalculer;

                //On effectue les mofidification nécessaire
                $modificationMaintien = Pdo_Maintien::updateMaintienSorti("E", $id);
                $modifictionPCb = Pdo_Lots_PCB_Armoire::updateLotPcbArmoire($dureeUtilisation, $id);
                
                //Si tout est bon, on affiche un essage pour l'utilisateur et on reviens sur la page de garde au bout de 10s
                if ($modificationMaintien and $modifictionPCb) {
                    echo "Le lot a bien été modifier";
                    header("refresh:10;url=index.php");
                }
            } else {
                //On récupere la durée d'asséchage nécessaire
                $dureeAssechage = Pdo_Type_Assechage::getTemps($type);
                foreach ($dureeAssechage as $uneduree) {
                    $duree = $uneduree["duree"];
                }

                //On mets la date de disponibilité a jour
                $dateDispo = date("y-m-d H:m:s", strtotime('now +' . $duree . ' Hour'));

                //On récupere le niveau MSl
                $msl = Pdo_Lots_PCB_Armoire::getNiveauMSL($id);
                foreach ($msl as $unNiveau) {
                    $niveauMsl = $unNiveau["niveau_msl"];
                }
                
                //On récupere le temps pour le niveau MSl
                $tempsMsl = Pdo_NiveauMSL::getDureeRestante($niveauMsl);
                foreach ($tempsMsl as $unTemps) {
                    $temps = $unTemps["temps"];
                }

                //On effectue toutes les modifications nécessaire 
                $miseAJourLot = Pdo_Lots_PCB_Armoire::updateLotPcbArmoire($temps, $id);
                $validationTransfert = Pdo_Assechage::setAssechage($today, $duree, $dateDispo, $id, $type);
                $suppressionAssechage = Pdo_Maintien::deleteMaintien($id);

                //Si tout est bon alors on affiche un message qui disparati au bout de 10 sec 
                if ($validationTransfert && $suppressionAssechage) {
                    echo "Le transfert c'est bien passé";
                    header("refresh:10;url=index.php");
                }
            }
        }
        break;
}
?>


