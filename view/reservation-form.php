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
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body>
    <?php require ('require/header.php'); ?>         
        <main>
            <section class="section-reservation">
                <p class="descr-reservation">Les réservations se font de 8h à 19h par tranche d'une heure.
                Vous pouvez réserver plusieurs heures d'affilées.</p>
                <p>
                <?php 
                if(isset($_GET['msg']) && $_GET['msg']=='reservreussie') {?> 
                <p>Réservation réussie.</p> <?php
                } ?>
                <form class="form" action="../traitements/form-traitement/form-reservation.php" method="post">
                    <h1>Formulaire de réservation</h1>
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" maxlength="80">
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
                    <label for="datedebut">Date du début</label>
                    <input type="datetime-local" min='2021-12-14 08:00:00' max='2022-12-31 19:00:00' id="datedebut" name="datedebut" step="3600">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptydatedebut') {
                    ?> <p>Le champs date de début est vide.</p> 
                    <?php }
                    if(isset($_GET['err']) && $_GET['err']=='weekend') {?> 
                    <p>Veuillez choisir un jour de semaine ouvré.</p> 
                    <?php } 
                    if(isset($_GET['err']) && $_GET['err']=='errorheure') {?> 
                    <p>Veuillez choisir un créneau compris entre 8h et 18h.</p> 
                    <?php }?>
                    <label for="datefin">Date de fin</label>
                    <input type="datetime-local" id="datefin" name="datefin" min='2021-12-14 08:00:00' max='2022-12-31 18:00:00' step="3600">
                    <?php 
                    if(isset($_GET['err']) && $_GET['err']=='emptydatefin') {?> 
                    <p>Le champs date de fin est vide.</p> <?php 
                    }
                    if(isset($_GET['err']) && $_GET['err']=='existcreneau') {?> 
                    <p>Ce créneau est déja pris, veuillez choisir un autre créneau.</p><?php 
                    }?>
                    <input type="submit" id="button" name="button">
                </form>
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   
