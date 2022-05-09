<!--Cette page sert a tranferer un lot en matien s'il n'est pas sorti, théoriquement, il est fini-->
<h1 style="margin-left: 120px">Transfert d'un lot en maintien</h1>
<div class="container" style="margin-left: 30px;">
    <form method="post" action="index.php?uc=gestion_msl&action=transfert&transf=maintien">
        <label>Voulez vous le mettre en assechage ? </label>
        <br>

        <input type="radio" name="transfert" value="Oui">
        <label>Oui</label>

        <input type="radio" name="transfert" value="Non">
        <label>Non</label>
        <br>

        <div id="transfert">
            <label>Voulez vous l'utiliser maintenant ? </label>
            <br>

            <input type="radio" name="utilisation" value="Oui">
            <label>Oui</label>

            <input type="radio" name="utilisation" value="Non">
            <label>Non</label>
            <br>
        </div>

        <div id="assechage">
            <label>Veuillez choisir le type d'assechage : </label>
            <br>

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

        <p id="Refus">Si vous ne voulez rien faire, cliquer sur "Valider"</p>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" /></script>
        <script type="text/javascript">
            $(document).ready(function () {

                $('#transfert').hide();
                $('#Refus').hide();
                $('#assechage').hide();

                $('input[name="transfert"]').change(function () { // lorsqu'on change de valeur dans la liste
                    var valeur = $(this).val(); // valeur sélectionnée

                    if (valeur != '') { // si non vide
                        if (valeur == 'Oui') {
                            $('#transfert').show();
                            $('#Refus').hide();
                        } else {
                            $('#Refus').show();
                            $('#transfert').hide();
                        }
                    }
                });
                
                $('input[name="utilisation"]').change(function () { // lorsqu'on change de valeur dans la liste
                    var valeur = $(this).val(); // valeur sélectionnée

                    if (valeur != '') { // si non vide
                        if (valeur == 'Oui') {
                            $('#assechage').hide();
                        } else {
                            $('#assechage').show();
                        }
                    }
                });
            });
        </script>
        <input type="submit" name="Valider">
    </form>
</div>


