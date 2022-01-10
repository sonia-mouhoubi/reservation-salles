<?php 
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
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body class="body-inscription">
    <?php require ('require/header.php'); ?>         
        <main>
            <section class="sect-reserv">
                <div>
                <h2>Créneaux réservés</h2>
                <?php 
                foreach($res as $value) { ?>
                    <p><span>Titre : </span><?php echo $value['titre']?></p>
                    <p><span>Nom : </span><?php echo $value['login']?></p>
                    <p><span>description : </span><?php echo $value['description']?></p>
                    <p><span>Date de début : </span><?php echo $value['debut']?></p>
                    <p><span>Date de fin : </span><?php echo $value['fin']?></p>
                <?php } ?>  
                </div>
                <img src="../assets/img/reservation.jpg" alt="">
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   
