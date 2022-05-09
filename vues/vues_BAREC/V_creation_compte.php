<div class="container">
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
            <label for="login">Login</label><input type="checkbox" name="valid_login" disabled="False">
            <input type="text" id="login" name="login" class="form-control" id="emaill" placeholder="nom.prenom@ba.fr">
            <p id="info_login"></p>
            <script>
                var login = document.getElementById("login");
                var info_login = document.getElementById("info_login");
                var valid = document.getElementById("valid_login");
                var validation_login = false;
                document.getElementById("validation").disabled= true;
                
                login.oninput = function () {
                    if (/[a-z]\.[a-z]{2,}@(ba)\.(fr)/.test(login.value)) {
                        info_login.innerHTML = "Le login est bon";
                        valid.checked = true;
                        validation_login = true;
                    } else {
                        info_login.innerHTML = "Le login est une adresse mail du style : nom.prenom@ba.fr";
                    }
                };
            </script>
        </div>

        <div class="form-group col-md-9">
            <label for="password">Mot de passe</label><input type="checkbox" name="valid_login" disabled="False">
            <input type="password" id="mdp" name="mdp" class="form-control" 
                   placeholder="Indiquer votre mot de passe" maxlength=16 style="width: 275px">
            <p id="info_mdp"></p>
            <p id="info_mdp2"></p>
            <p id="info_generale_mdp">Le mot de passe doit faire entre 5 et 16 caractéres et 
                contenir au moins une majuscule, une minuscule et un chiffre </p>
            <script>
                var mdp = document.getElementById("mdp");
                var info = document.getElementById("info_mdp");
                var info2 = document.getElementById("info_mdp2");
                var infoG = document.getElementById("info_generale_mdp");
                var validation_mdp = false;
                
                mdp.oninput = function () {
                    infoG.innerHTML = "";
                    if (mdp.value.length < 5) {
                        info.innerHTML = "Vous devez saisir minimum 5 caractéres";
                    } else {
                        if (mdp.value.length > 10) {
                            info.innerHTML = "Le mot de passe est accepter et est securiser";
                            validation_mdp = true;
                        } else {
                            if (mdp.value.length > 5) {
                                info.innerHTML = "Le mot de passe est accepter mais n'est pas tres securiser";
                                validation_mdp = true;
                            }
                        }
                    
                    
                    
                    }
                    ;

                    //On teste toutes les disposition des lettres dans le mots de passe pour 
                    //verifier la presence de Majuscule, minuscule, et chiffre
                    info2.innerHTML = "Il vous faut : <br>une majuscule <br>une minuscule <br>un chiffre";
                    if (/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/.test(mdp.value)) {
                        info2.innerHTML = "Vous avez mis tout les caractéres obligatoire";
                    } else if (/(?=.*[a-z])(?=.*[A-Z])/.test(mdp.value)) {
                        info2.innerHTML = "Il vous faut : <br>un chiffre";
                    } else if (/(?=.*[0-9])(?=.*[A-Z])/.test(mdp.value)) {
                        info2.innerHTML = "Il vous faut : <br>une minuscule";
                    } else if (/(?=.*[a-z])(?=.*[0-9])/.test(mdp.value)) {
                        info2.innerHTML = "Il vous faut : <br>une majuscule";
                    } else if (/(?=.*[a-z])/.test(mdp.value)) {
                        info2.innerHTML = "Il vous faut : <br>une majuscule <br>un chiffre ";
                    } else if (/(?=.*[A-Z])/.test(mdp.value)) {
                        info2.innerHTML = "Il vous faut : <br>une minuscule <br>un chiffre ";
                    } else if (/(?=.*[0-9])/.test(mdp.value)) {
                        info2.innerHTML = "Il vous faut : <br>une majuscule <br>une minuscule ";
                    };
                    
                    if (validation_login === true && validation_mdp === true){
                        document.getElementById("validation").disabled= false;
                    }
                };
            </script>
        </div>


        <button id="validation" type="submit" class="btn btn-primary">Validation</button>
    </form>
</div>