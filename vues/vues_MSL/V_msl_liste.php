<button class="accordion">Lots PCB prêt à sortir d'asséchage</button>
<div class="panel">
    <table style="border-style: solid">
        <tbody>
            <tr id='titre'>
                <td>Nom de l'armoire</td>
                <td>Numéro du lot</td>
                <td>Quantité</td>
                <td>Date de disponibilité du lot</td>
            </tr>
            <?php
            foreach ($assechageSortie as $unLot) {
                ?>
                <tr>
                    <td><?php echo $unLot["nom"]; ?></td> 
                    <td><?php echo $unLot["id_lot"]; ?></td>
                    <td><?php echo $unLot["quantite"]; ?></td> 
                    <td><?php echo $unLot["date_dispo"]; ?></td>
                </tr>
                <?php
            };
            ?>

        </tbody>
    </table>
</div>

<button class="accordion">Lots PCB en maintien arrivant au seuil d'alarme</button>
<div class="panel">
    <table style="border-style: solid">
        <tbody>
            <tr id='titre'>
                <td>Nom de l'armoire</td>
                <td>Numéro du lot</td>
                <td>Quantité</td>
                <td>Durée d'utilisation restante</td>
                <td>Seuil_alarme</td>
            </tr>
            <?php
            foreach ($maintien as $unLotM) {
                ?>
                <tr>
                    <td><?php echo $unLotM["nom"]; ?></td> 
                    <td><?php echo $unLotM["id_lot"]; ?></td>
                    <td><?php echo $unLotM["quantite"]; ?></td> 
                    <td><?php echo $unLotM["duree_utilisation_restante"]; ?></td> 
                    <td><?php echo $unLotM["seuil_alarme"]; ?></td> 
                </tr>
                <?php
            };
            ?>

        </tbody>
    </table>
</div>

<style type="text/css">
    table,tr,td,p {
        border: 2px solid;
        text-align: center;
    }

    table {
        position: relative;
        width: 900px; 
        margin: auto; 
        height: 200px;
    }

    #titre{
        font-weight: bold;
    }

    h3{
        position: relative;
        margin-left:250px; 
    }
    
    /*Pour l'accordéon*/
    .accordion {
        background-color: #eee;
        border: none;
        color: #444;
        cursor: pointer;
        position: relative;
        margin-left: 269px; 
        padding: 18px;
        outline: none;
        text-align: left;
        transition: 0.4s;
        width: 900px;
    }

    .active, .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        display: none;
        overflow: hidden;
    } 
</style>

<script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            
            this.classList.toggle("active");

            
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
