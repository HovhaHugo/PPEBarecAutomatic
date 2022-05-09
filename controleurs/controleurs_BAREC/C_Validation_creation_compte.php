<div class="container">
    <?php
    $mdp = $_POST['mdp'];
    $login = $_POST['login'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $statut = $_POST['statut'];
    $verif_Login = FALSE;
    $verif_mdp = FALSE;

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $login)) {
        $verif_Login = TRUE;
    }

    if (preg_match("#[a-zA-Z0-9.]#", $mdp)) {
        $verif_mdp = TRUE;
    }
    if ($verif_mdp == TRUE and $verif_Login == TRUE) {
        $result = Pdo_Utilisateur::setUtilisateur($nom, $prenom, $statut, $login, $mdp);
        $_SESSION['login'] = $nom;
        header('Location: index.php');
    } else {
        ?>
        <form action="index.php?uc=authentification&action=validation" method="post">
            <div class="form-group col-md-4">
                <h3>Creation d'un compte</h3>
            </div>
            <div class="form-group col-md-4">
                <label for="password">Nom</label>
                <input type="text" name="nom" class="form-control"  
                       placeholder="Indiquer votre nom" maxlength=16>
                <label for="password">Prenom</label>
                <input type="text" name="prenom" class="form-control"  
                       placeholder="Indiquer votre prenom" maxlength=16>
                <label for="password">Statut</label>
                <input type="text" name="statut" class="form-control"  
                       placeholder="Indiquer votre statut" maxlength=16>
            </div>
            <div class="form-group col-md-4">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="emaill" placeholder="Indiquer votre login">
                <p id="erreur_login">Le login doit étres un mail avec un @ et un . </p>
            </div>

            <div class="form-group col-md-4">
                <label for="password">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" id="password" placeholder="Indiquer votre mot de passe">
                <p id="erreur_mdp">Le mot de passe doit contenir 5 caractére minimum avec Majuscule, minuscule et chiffre </p>
            </div>
            <script>
                var mdp = document.getElementById("mdp");
                var login = document.getElementById("login");
                var erreur_mdp = document.getElementById("erreur_mdp");
                var erreur_login = document.getElementById("erreur_login");

                mdp.oninput = function () {
                    jQuery('#erreur_mdp').hide();
                    erreur_mdp.style.display = 'none';
                }

                login.oninput = function () {
                    erreur_login.innerHTML = "";
                }

            </script>
            <button type="submit" class="btn btn-primary">Validation</button>

        </form>
        <a href="index.php?uc=creation_compte">Créer un compte</a>
    </div>
    <?php
}
?>