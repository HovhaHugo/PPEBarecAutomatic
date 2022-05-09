<p>En cours de construction : Ceci doit faire un transfert avec un lot en maintien s'il est sorti </p>
<h1 style="margin-left: 120px">Transfert d'un lot en maintien</h1>
<div class="container" style="margin-left: 130px;">
    <form method="post" action="index.php?uc=gestion_msl&action=transfert&transf=maintien">
        <label>Voulez vous le mettre en assechage ? </label>
        <br>

        <input type="radio" name="transfert" value="Oui">
        <label>Oui</label>

        <input type="radio" name="transfert" value="Non">
        <label>Non</label>
        <br>
        
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
        
        <div id="remise">
            <label>Voulez vous le remettre en maintenant ? </label>
            <br>

            <input type="radio" name="remise" value="Oui">
            <label>Oui</label>

            <input type="radio" name="remise" value="Non">
            <label>Non</label>
            <br>
        </div>

        <div id="message">
            <p>Nous allons donc remettre le lot en maintien</p>
        </div>

        <p id="Refus">Si vous ne voulez rien faire, cliquer sur "Valider"</p>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" /></script>
        <script type="text/javascript">
            $(document).ready(function () {

                $('#remise').hide();
                $('#assechage').hide();
                $('#Refus').hide();
                $('#message').hide();

                $('input[name="transfert"]').change(function () { // lorsqu'on change de valeur dans la liste
                    var valeur = $(this).val(); // valeur sélectionnée

                    if (valeur !== '') { // si non vide
                        if (valeur === 'Oui') {
                            $('#assechage').show();
                            $('#remise').hide();
                        } else {
                            $('#remise').show();
                            $('#assechage').hide();
                        }
                    }
                });
                
                $('input[name="remise"]').change(function () { // lorsqu'on change de valeur dans la liste
                    var valeur = $(this).val(); // valeur sélectionnée

                    if (valeur !== '') { // si non vide
                        if (valeur === 'Non') {
                            $('#Refus').show();
                        } else {
                            $('#Refus').hide();
                        }
                    }
                });
            });
        </script>
        <input type="submit" name="Valider">
    </form>
</div>


