<?php 
require ('../traitements/page-traitement/bdd.php'); 
?>
<header>
    <a class="logo" href="accueil.php"><span>Luxury</span><span>Meeting Room</span></a>
    <input type="checkbox" id="burger" hidden>
    <label class="menu-burger" for="burger">
        <span id="span1"></span>
        <span id="span2"></span>
        <span id="span3"></span>
    </label>
    <nav>
        <?php  
        if(!isset($_SESSION['login'])) { ?>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a> 
        <?php } 
        if(isset($_SESSION['login'])) { ?>
        <a href="profil.php">Profil</a>    
        <a href="planning.php">Planning</a>
        <a href="reservation-form.php">Réservation</a>    
        <?php }?>
        <?php if(isset($_SESSION['login'])) { ?> 
        <form action="../traitements/form-traitement/form-header.php" method="post">
            <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
        </form> 
        <?php }?>
    </nav> 
    <?php 
    if(isset($_SESSION['login'])) { ?>
    <p class="msg-connect">Bonjour <span><?php echo $_SESSION['login'];?></span>, vous êtes connectés !</p>
    <?php }?>

    <div class="sect-header">
        <p>Salle équipée pour réunion ou formation.</p>
        <p>Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo 
        imperii dicebatur, et iracundae suspicionum quantitati proximorum 
        cruentae blanditiae exaggerantium incidentia et dolere inpendio 
        simulantium.</p>
    </div>
</header>
        
