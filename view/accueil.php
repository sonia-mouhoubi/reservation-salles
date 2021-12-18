<?php
// Initialiser ou récupérer des sessions.
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Réservation de salles</title>
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
    <body>
        <?php require ('require/header.php'); ?>         
        <main class="main-accueil">
            <span>
            <?php 
            if(isset($_GET['msg']) && $_GET['msg']=='connectreussie') {
            ?> <p>Connexion réussie.</p> <?php
            } ?>
            </span>
            <section class="description-accueil">
                <h1>RESERVATION DE SALLES</h1>
                <p>Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo 
                ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis</p>
            </section>
            <div>
                <img class="chat-accueil" src="../assets/img/chat-accueil.png" alt="">
            </div>    
        </main>
        <?php require ('require/footer.php'); ?>         
    </body>
</html>
   
