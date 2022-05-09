<h2 style="margin-left: 120px">Ajout d'un lot de PCB ou transfert d'une section à une autre</h2>
<div class="container">
    <form method="post" action="index.php?uc=gestion_msl&action=creation">

        <!--Liste déroulante des differente référence BAREC-->
        <label for="refBarec">Référence BAREC : </label>
        <select name="refBarec">
            <option value="" disabled selected>-Selectionner-</option>
            <?php
            //On parcours le tableau de resultat pour mettre les éléments dans la liste déroulante
            foreach ($refBarec as $uneReference) {
                ?>
                <option value="<?php echo $uneReference[0]; ?>"><?php echo $uneReference[0]; ?></option>
                <?php
            }
            ?>
        </select>
        <br>

        <!--On demande la quantité de lot-->
        <label for="qteLot">Quantité de composant dans le lot : </label>
        <input type="number" min="0" step="1" name="qteLot"><br>

        <!--Liste déroulante des different niveaux de MSL-->
        <label for="niveauMSL">Niveau MSL : </label>
        <select name="niveauMSL">
            <option value="" disabled selected>-Selectionner-</option>
            <?php
            //On parcours le tableau de resultat pour mettre les éléments dans la liste déroulante
            foreach ($msl as $unNiveauMSL) {
                ?>
                <option value="<?php echo $unNiveauMSL[0]; ?>"><?php echo $unNiveauMSL[0]; ?></option>
                <?php
            }
            ?>
        </select>
        <br>

        <!--Liste déroulante des different niveaux de MSL-->
        <label for="armoire">Armoire : </label>
        <select name="armoire">
            <option value="" disabled selected>-Selectionner-</option>
            <?php
            //On parcours le tableau de resultat pour mettre les éléments dans la liste déroulante
            foreach ($armoire as $uneArmoire) {
                ?>
                <option value="<?php echo $uneArmoire['id']; ?>"><?php echo $uneArmoire['nom']; ?></option>
                <?php
            }
            ?>
        </select>
        <br>

        <label for="section">Section : </label>
        <select name="section">
            <option value="" disabled selected>-Selectionner-</option>
            <option value="Maintien">Maintien</option>
            <option value="Assechage">Assechage</option>
        </select>

        <!--Partie qui ne s'affiche que si l'on choisit Maitien-->
        <div id="maintien">
            <label>Quel est le seuil d'alarme [en heure] </label>
            <input type="number" min='0' step='1' name='seuil'><br>
        </div>

        <!--Partie qui ne s'affiche que si l'on choisit Assechage-->
        <div id="assechage">
            <label>Quelle est la durée d'assechage [en heure] : </label>
            <input type="number" min='0' step='1' name='dureeAssechage'><br>

            <!--Liste déroulante des different type d'assechage-->
            <label for="typeAssechage">Type asséchage : </label>
            <select name="typeAssechage">
                <option value="" disabled selected>-Selectionner-</option>
                <?php
                //On parcours le tableau de resultat pour mettre les éléments dans la liste déroulante
                foreach ($assechage as $unTypeAssechage) {
                    ?>
                    <option value="<?php echo $unTypeAssechage[0]; ?>"><?php echo $unTypeAssechage[0]; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <br>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" /></script>
        <script type="text/javascript">
            $(document).ready(function () {

                $('#maintien').hide(); // on cache le champ par défaut
                $('#assechage').hide();

                $('select[name="section"]').change(function () { // lorsqu'on change de valeur dans la liste
                    var valeur = $(this).val(); // valeur sélectionnée

                    if (valeur != '') { // si non vide
                        if (valeur == 'Maintien') {
                            $('#maintien').show();
                        } else {
                            $('#maintien').hide();
                        }
                        if (valeur == 'Assechage') {
                            $('#assechage').show();
                        } else {
                            $('#assechage').hide();
                        }
                    }
                });

            });
        </script>

        <input type="submit" name="valider" value="Valider">
    </form>
</div>