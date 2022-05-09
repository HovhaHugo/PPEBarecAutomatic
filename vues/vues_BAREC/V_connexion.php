<div class="container">
    <form action="index.php?uc=authentification&action=valid_connexion" method="post">
        <div class="form-group col-md-4">
            <h3>Authentification</h3>
        </div>
        
        <div class="form-group col-md-4">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" id="emaill" placeholder="Indiquer votre login">
        </div>
        
        <div class="form-group col-md-4">
            <label for="password">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" id="password" placeholder="Indiquer votre mot de passe">
        </div>
        
        <button type="submit" class="btn btn-primary">Connexion</button>

    </form>
    <a href="index.php?uc=authentification&action=creation_compte">Créer un compte</a>
</div>