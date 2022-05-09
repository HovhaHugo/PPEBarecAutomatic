<div class="container">
    <?php
    if (isset($_SESSION['login'])) {
        
        echo '<h3>Bienvenue sur le site de Barec Automatisme. Vous etes connecter ' . $_SESSION['login'] . ' !</h3>';
        include 'vues/vues_BAREC/V_carrousel.php';
    } else {
        echo "<h3>Bienvenue sur le site de Barec Automatisme</h3>";
        echo "<h5>Vous devez vous connecter pour acceder aux fonctionnalités du site </h5>";
        include 'vues/vues_BAREC/V_carrousel.php';
        }
    ?>
</div>
