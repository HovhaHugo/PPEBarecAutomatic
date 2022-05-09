<h1 style="margin-left: 120px">Transfert d'un lot en assechage</h1>
<div class="container" style="margin-left: 30px;">
    <form method="post" action="index.php?uc=gestion_msl&action=transfert&transf=assechage">
        <label>Voulez vous le mettre en maintien ? </label>
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
            
            <label>Quel est le seuil ? [en heure] </label>
            <input type="number" min='0' step='1' name='seuil'><br>
        </div>

        <p id="Refus">Si vous ne voulez rien faire, cliquer sur "Valider"</p>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" /></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var Transfert = document.querySelector('input[value="Oui"]');
                var Rien = document.querySelector('input[value="Non"]');
                $('#transfert').hide();
                $('#Refus').hide();


                Transfert.onchange = function () {
                    if (Transfert.checked) {
                        $('#transfert').show();
                    } else {
                        $('#transfert').hide();
                    }
                };

                Rien.onchange = function () {
                    if (Rien.checked) {
                        $('#Refus').show();
                    } else {
                        $('#Refus').hide();
                    }
                };
            });
        </script>
        <input type="submit" name="Valider">
    </form>
</div>


