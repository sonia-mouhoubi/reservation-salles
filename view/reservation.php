<?php 
// Initialiser ou récupérer des sessions.
// session_start();
// Connexion à la base de donnée.
require ('../traitements/page-traitement/bdd.php'); 
// Lien pour la page de traitement.
require ('../traitements/page-traitement/traitement-reservation.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Réservation - Réservation de salles</title>
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
    <body class="body-inscription">
    <?php require ('require/header.php'); ?>         
        <main>
            <section class="section-commentaire">
                <h1>Réservation</h1>
                
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   
