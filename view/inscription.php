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
        <title>Inscription - Réservation de salles</title>
        <meta name="description" content="Création d'un site web de réservation de salles">
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
            <section class="section-inscription">
                <img src="../assets/img/inscription.jpg" alt="Image de bureau pour la page inscription">
                <form class="form" action="../traitements/form-traitement/form-inscription.php" method="post">
                    <h2>Inscrivez-vous</h2>
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptylogin') {
                    ?> <p>Le champs login est vide.</p> <?php }
                    if(isset($_GET['err']) && $_GET['err']=='loginexit') {
                    ?> <p>Ce login exite déja.</p> <?php 
                    }?>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptymdp') {?> 
                    <p>Le champs mot de passe est vide.</p> <?php
                    }?>
                    <label for="password2">Confirmation du mot de passe</label>
                    <input type="password" id="password2" name="password2">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptymdp2') {?> 
                    <p>Le champs confirmation de mot de passe est vide.</p> <?php
                    } if(isset($_GET['err']) && $_GET['err']=='mdpnotidem') {?> 
                    <p>La confirmation de mot de passe ne correspond pas.</p> <?php 
                    }?>
                    <input type="submit" id="button" name="button">
                </form>
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   
