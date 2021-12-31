<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('../traitements/page-traitement/bdd.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion - Réservation de salles</title>
        <meta name="description" content="Création d'un site web de réservation de salles"><link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body>
    <?php require ('require/header.php'); ?>         
        <main>
            <span>
            <?php 
            if(isset($_GET['msg']) && $_GET['msg']=='insreussie') {
            ?> <p>Inscription réussie.</p> <?php
            } ?>
            </span>
            <section class="section-connexion">
            <img src="../assets/img/connexion.jpg" alt="Image de bureau pour la page connexion">
                <form class="form" action="../traitements/form-traitement/form-connexion.php" method="post">
                    <h1>Connexion</h1>
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptylogin') {
                    ?> <p>Le champs login est vide.</p> <?php
                    }
                    if(isset($_GET['err']) && $_GET['err']=='loginexist') {
                    ?> <p>Le login exite déja.</p> <?php
                    }?>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptymdp') {
                    ?> <p>Le champs mot de passe est vide.</p> <?php
                    }?>
                    <input type="submit" id="button" name="button">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='errlogmdp') {
                    ?> <p>Identifiant ou mot de passe incorrecte.</p> <?php
                    }?>
                </form>
            </section>
        </main>
        <?php require ('require/footer.php'); ?>  
    </body>
</html>
   
