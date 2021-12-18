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
        <title>Formulaire de réservation - Réservation de salles</title>
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
    <body class="body-inscription"LP>
    <?php require ('require/header.php'); ?>         
        <main>
            <section class="section-commentaire">
                <h1>Formulaire de réservation</h1>
                <p>
                <?php 
                if(isset($_GET['msg']) && $_GET['msg']=='reservreussie') {
                    echo 'Réservation réussie.';
                } ?>
                </p>
                <form class="form" action="../traitements/form-traitement/form-reservation.php" method="post">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" maxlength="25">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptytitre') {
                    ?> <p>Le champs titre est vide.</p> <?php 
                    }?>
                    <label for="desc">Description</label>
                    <textarea id="desc" name="desc" rows="5" cols="33" maxlength="150"></textarea>
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptydesc') {
                    ?> <p>Le champs description est vide.</p> <?php 
                    }?>
                    <label for="datedebut">Confirmation du mot de passe</label>
                    <input type="datetime-local" min='2021-12-14 08:00:00' max='2022-12-31 19:00:00' id="datedebut" name="datedebut">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptydatedebut') {
                    ?> <p>Le champs date de début est vide.</p> <?php 
                    }?>
                    <label for="datefin">Confirmation du mot de passe</label>
                    <input type="datetime-local" id="datefin" name="datefin">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptydatefin') {
                    ?> <p>Le champs date de début est vide.</p> <?php 
                    }?>
                    <input type="submit" id="button" name="button">
                </form>
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   
