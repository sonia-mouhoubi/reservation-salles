<?php 
require ('../traitements/page-traitement/bdd.php'); 
require ('../traitements/page-traitement/traitement-header.php'); 
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
    if(isset($_GET['msg']) && $_GET['msg']=='insreussie') {
    ?> <p>Inscription réussie.</p> <?php
    }
    if(isset($_GET['msg']) && $_GET['msg']=='connectreussie') {
    ?> <p>Connexion réussie.</p> <?php
    } 
    if(isset($_SESSION['login'])) { ?>
    <p class="msg-connect">Bonjour <span><?php echo $_SESSION['login'];?></span>, vous êtes connectés !</p>
    <?php }
    if($url==$url_accueil) { ?>
    <div class="sect-header">
        <p>Salle équipée pour réunion ou formation.</p>
        <p>Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo 
        imperii dicebatur, et iracundae suspicionum quantitati proximorum 
        cruentae blanditiae exaggerantium incidentia et dolere inpendio 
        simulantium.</p>
    </div>
    <?php } 
    elseif($url==$url_inscription) { ?>
        <div class="sect-header">
            <h1>Inscription</h1>    
        </div>
    <?php } 
    elseif($url==$url_connexion) { ?>
        <div class="sect-header">
            <h1>Connexion</h1>    
        </div>
    <?php } 
    elseif($url==$url_profil) { ?>
        <div class="sect-header">
            <h1>Profil</h1>    
        </div>
    <?php }  
    elseif($url==$url_planning) { ?>
        <div class="sect-header">
            <h1>Planning</h1>    
        </div>
    <?php } 
    elseif($url==$url_reservation_form) { ?>
        <div class="sect-header">
            <h1>Formulaire de réservation</h1>    
        </div>
    <?php }
    elseif($url==$url_reservation) { ?>
        <div class="sect-header">
            <h1>Réservation</h1>    
        </div>
    <?php } ?>
</header>
        
