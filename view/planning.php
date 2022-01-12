<?php 
// Connexion à la base de donnée.
require ('../traitements/page-traitement/bdd.php'); 
// Lien pour la page de traitement.
require ('../traitements/page-traitement/traitement-planning.php'); 
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
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body class="body-inscription">
    <?php require ('require/header.php'); ?>         
        <main>
            <section class="section-planning">
                <h2>Planning de réservation</h2>
                <?php 
                if(isset($_GET['week'])) {
                    $week = $_GET['week'];
                    echo "<div class='next-prev'><a href='planning.php?week=".($week-1)."'>PREV</a>";
                    echo "<a href='planning.php?week=".($week+1)."'>NEXT</a></div>";  
                }
                else {
                    echo "<div class='next-prev'><a href='planning.php?week=-1'>PREV</a>";
                    echo "<a href='planning.php?week=1'>NEXT</a></div>";  
                }
                ?>
                <table>
                    <thead>
                        <tr> 
                            <th></th>
                        <?php 
                        if(isset($_GET['week'])){
                            $date = new DateTime("mon this week $week weeks");
                            echo "<th>Lundi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("tue this week $week weeks");
                            echo "<th>Mardi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("wed this week $week weeks");
                            echo "<th>Mercredi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("thu this week $week weeks");
                            echo "<th>Jeudi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("fri this week $week weeks");
                            echo "<th>Vendredi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("sat this week $week week");
                            echo "<th>Samedi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("sun this week $week weeks");
                            echo "<th>Dimanche<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                        }
                        else {
                            $week = 0;
                            $date = new DateTime("mon this week $week weeks");
                            echo "<th>Lundi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("tue this week $week weeks");
                            echo "<th>Mardi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("wed this week $week weeks");
                            echo "<th>Mercredi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("thu this week $week weeks");
                            echo "<th>Jeudi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("fri this week $week weeks");
                            echo "<th>Vendredi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("sat this week $week week");
                            echo "<th>Samedi<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                            $date = new DateTime("sun this week $week weeks");
                            echo "<th>Dimanche<br>".date("d/m/Y", $date->getTimeStamp())."</th>";
                        }?>     
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    // $h pr les horaires, $c pour les cases. 
                    for($h=8;$h<19;$h++) {
                        echo "<tr><td>".$h."h-".($h+1)."h</td>";
                        for($c=1;$c<=7; $c++) {
                            echo "<td>";
                            foreach ($res as $value) { 
                            // Convertir la date du début en timestamp.
                                $date_debut = strtotime($value['debut']);
                            // Récupère le jour et l'heure avc date().
                                $day_debut = date('N', $date_debut);
                                $heure_debut = date('H', $date_debut);

                            // Convertir la date de fin en timestamp.
                                $date_fin = strtotime($value['fin']);
                            // Récupère le jour et l'heure avc date().
                                $day_fin = date('N', $date_fin);
                                $heure_fin = date('H', $date_fin);
                            
                            // Covertir l'heure au format int
                                $heure_debut = intval($heure_debut);
                                $heure_fin = intval($heure_fin);

                            // Var pour récupérer l'id de la réservation.
                                $id_res = $value['id'];
                            // Condition pour pouvoir placer un rdv
                                if($day_debut==$c && $heure_debut==$h) {
                                    echo "<a class='lien-reserv' href='reservation.php?id=$id_res'>".$value['titre']." par ".$value['login']."</a>";
                                }
                            // Condition pour placer plusieus rdv 
                                elseif ($day_debut==$c && $heure_fin>$h && $heure_debut<$h) {
                                    echo "<a class='lien-reserv' href='reservation.php?id=$id_res'>".$value['titre']." par ".$value['login']."</a>";
                                }
                            }
                            echo "</td>"; 
                        }
                        echo "</tr>"; 
                    }
                    ?>
                    </tbody>
                </table>  
            </section>
        </main>
        <?php require('require/footer.php'); ?>         
    </body>
</html>
   