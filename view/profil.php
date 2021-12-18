<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('../traitements/page-traitement/bdd.php'); 
// Connexion à la base de donnée.
require ('../traitements/page-traitement/traitement-profil.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil - Réservation de salles</title>
        <meta name="description" content="Création d'un site web de réservation de salles">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Crafty+Girls&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body class="body-profil">
    <?php require ('require/header.php'); ?>         
        <main>
            <section>
                <h1>Profil</h1>
                <p>
                <?php 
                if(isset($_GET['msg']) && $_GET['msg']=='modifreussie') {
                    echo 'Modification réussie.';
                } ?>
                </p>
                <form class="form" action="../traitements/form-traitement/form-profil.php" method="post">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" value="<?php if(isset($_SESSION['login'])) {echo $res[0]['login'];}?>">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptylogin') {
                    ?> <p>Le champs login est vide.</p> <?php
                    }
                    if(isset($_GET['err']) && $_GET['err']=='loginexist') {
                    ?> <p>Le login exite déja.</p> <?php
                    }?>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre nouveau mot de passe">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptymdp') {
                    ?> <p>Le champs mot de passe est vide.</p> <?php
                    }?>
                    <label for="password2">Confirmation du mot de passe</label>
                    <input type="password" id="password2" name="password2" placeholder="Entrez la confirmation du mot de passe">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptymdp2') {
                    ?> <p>Le champs confirmation mot de passe est vide.</p> <?php
                    }?>
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='notidemmdp') {
                    ?> <p>La confirmation de mot de passe ne correspond pas.</p> <?php   
                    }?>
                    <input type="submit" id="button" name="button">
                </form>
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   
