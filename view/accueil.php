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
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body>
        <?php require ('require/header.php'); ?>         
        <main class="main-accueil">
            <?php 
            if(isset($_GET['msg']) && $_GET['msg']=='connectreussie') {
            ?> <p>Connexion réussie.</p> <?php
            } ?>
            <section class="description-accueil">
                <h1>RESERVATION DE SALLES</h1>
                <p>Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo 
                ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis,
                si principis periclitetur vita, a cuius salute velut filo pendere statum orbis 
                terrarum fictis vocibus exclamabant.</p>
                <figure>
                    <img src="../assets/img/reunion-classe.jpg" alt="">
                    <figcaption>
                    <h2>Salle de réunion SOPHISTIQUE</h2>
                    Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo 
                    ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis,
                    si principis periclitetur vita, a cuius salute velut filo pendere statum orbis 
                    terrarum fictis vocibus exclamabant.</figcaption>
                </figure>
                <figure>
                    <img src="../assets/img/reunion-cosy.jpeg" alt="">
                    <figcaption>
                    <h2>Salle de réunion COSY</h2>
                    Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo 
                    ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis,
                    si principis periclitetur vita, a cuius salute velut filo pendere statum orbis 
                    terrarum fictis vocibus exclamabant.</figcaption>
                </figure>
                <figure>
                    <img src="../assets/img/reunion-accueil.jpeg" alt="">
                    <figcaption>
                    <h2>Salle de réunion CHIC</h2>
                    Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo 
                    ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis,
                    si principis periclitetur vita, a cuius salute velut filo pendere statum orbis 
                    terrarum fictis vocibus exclamabant.</figcaption>
                </figure>
                <figure>
                    <img src="../assets/img/reunion-mer.jpg" alt=""> 
                    <figcaption>
                    <h2>Salle de réunion DETENTE</h2>
                    Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo 
                    ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis,
                    si principis periclitetur vita, a cuius salute velut filo pendere statum orbis 
                    terrarum fictis vocibus exclamabant.</figcaption>
                </figure>
            </section>  
        </main>
        <?php require ('require/footer.php'); ?>         
    </body>
</html>
   
