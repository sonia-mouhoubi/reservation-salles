<?php 
// Initialiser ou récupérer des sessions.
// session_start();
// Connexion à la base de donnée.
require ('../traitements/page-traitement/bdd.php'); 
// Lien pour la page de traitement.
require ('../traitements/page-traitement/traitement-planning.php'); 
// $session_login = $_SESSION['login']; 
// $req2 = mysqli_query($bdd, "SELECT debut FROM reservations");
// $res2 = mysqli_fetch_all($req2, MYSQLI_ASSOC);
// $heure2 = substr($res2[1]['debut'], 11);
// var_dump($heure2);
// var_dump($res2);
// intval($heure2);
// var_dump(intval($heure2));

$session_id = $_SESSION['id']; 
// Requête pour récupérer la datetime de l'évènement.
$req = mysqli_query($bdd, "SELECT debut FROM reservations WHERE id_utilisateur='$session_id'");
// Résultat de la requête.
$res = mysqli_fetch_all($req, MYSQLI_ASSOC); 
var_dump($res);
// substr = Permet de récupérer une partie d'une chaîne de caractère.
$heure = substr($res[0]['debut'], 11, -6); // Récupération de l'heure.
// Convertir la string en int pour l'heure.
$heure = intval($heure);

// Récupération de la date.
$date = substr($res[0]['debut'], 0, -9); 
// Convertir la date en timestamp pour récupérer le jour.
$date = strtotime($date);
var_dump($date);
// Récupération du jour.
$date = date('N', $date);
var_dump($date);
// Convertir la string en int.
$date = intval($date);
var_dump($date);

// Tableau des jours de la semaines.
$jour = [
    1 => 'Lundi', 
    2 => 'Mardi', 
    3 => 'Mercredi', 
    4 => 'Jeudi', 
    5 => 'Vendredi',
    6 => 'Samedi', 
    7 => 'Dimanche',
];
$h="";
$rdvH = "rdvH";

$j="";
$rdvJ="rdvJ";

// if($heure==$h) {
//     echo $rdvH;
// }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Planning - Réservation de salles</title>
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
                <h1>Planning</h1>
                <table>
                    <thead>
                        <tr> 
                            <th></th>
                        <?php 
                        // Boucle pour récupérer les jours.
                        foreach($jour as $key => $value) {
                            echo "<th>".$value."</th>";
                            if($date==$key) {
                                echo $rdvJ;
                            }
                            var_dump($key);
                        }
                       
                        var_dump($key);

                        ?>     
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    // $h pr les horaires, $c pour les cases. 
                    for($h=8;$h<19;$h++) {
                        echo "<tr><td>".$h."h-".($h+1)."h</td>";
                        for($c=1;$c<=7; $c++) {
                            echo "<td>"; 
                            if($heure==$h) {
                                echo $rdvH;
                            }
                            echo "</td>"; 
                        }
                        echo "</tr>"; 
                    }
                    // var_dump($heure);
                    // var_dump($h);
                    // var_dump($date);
                    // var_dump($key);
                    // var_dump($d);

                    ?>
                    </tbody>
                </table>  
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   
