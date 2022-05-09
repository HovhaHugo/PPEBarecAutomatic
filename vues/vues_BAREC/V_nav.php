<nav class="navbar navbar-expand-lg bg-light navbar-light">
    <img src="img/logo_barec.png" alt="logo de l'entreprise"/>

    <!--Gestion du menu sur mobile-->
    <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#menu">
        <span class="navbar-toggler-icon fas fa-bars"></span>
    </button>


    <!--Liste des element dans le menu-->
    <div class="collapse navbar-collapse" id="menu">

        <?php
        if (isset($_SESSION["login"])) {
            ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Gestion MSL</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?uc=gestion_msl">Ajouter ou retirer un lot PCB</a>
                        <hr>
                        <a class="dropdown-item" href="index.php?uc=msl_liste">Afficher la liste des lots a surveiller</a>
                    </div> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Gestion PSB</a>
                    <div class="dropdown-menu">
                       <a class="dropdown-item" href="index.php">En cours de construction</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Gestion STH</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php">En cours de construction</a>
                    </div> 
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!--Balise href pour le login de l'utilisation pour la presentation !-->
                <li class='nav-item'><a class="nav-link" href="#"><span class="fas fa-user"></span>
                        <?php echo " ". $_SESSION['login']; ?></a></li>
                
                <li class='nav-item'><a class="nav-link" href="index.php?uc=authentification&action=se_deconnecter">
                        Se deconnecter<span class="fas fa-sign-in-alt"></span></a></li>
            </ul>  
        <?php } else {
            ?>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php?uc=authentification&action=se_connecter">
                        Se connecter<span class="fas fa-sign-in-alt"></span></a></li>
            </ul> 
        <?php }
        ?>
    </div>
</nav>