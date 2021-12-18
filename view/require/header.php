<?php 
require ('../traitements/page-traitement/bdd.php'); 
?>
<header>
    <nav>
        <?php  
        if(!isset($_SESSION['login'])) { ?>
        <a href="accueil.php">Accueil</a>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a> 
        <?php }?>
        <?php  
        if(isset($_SESSION['login'])) { ?>
        <a href="accueil.php">Accueil</a>
        <a href="profil.php">Profil</a>    
        <a href="planning.php">Planning</a>
        <a href="reservation.php">Réservations</a>  
        <a href="reservation-form.php">Formulaire de réservation</a>    
        <?php }?>
        <?php if(isset($_SESSION['login'])) { ?> 
        <form action="../traitements/form-traitement/form-header.php" method="post">
            <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
        </form> 
        <?php } ?>
    </nav> 
    <p>
    <?php 
    if(isset($_SESSION['login'])) {
        echo "Bonjour ".$_SESSION['login'].", vous êtes connectés !";
    }?>
    </p> 
</header>
        
