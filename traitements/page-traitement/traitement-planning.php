<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('bdd.php');
// Requête pour récupérer la date du début et fin et le login.
if(isset($_GET['week'])) { 
    $week = $_GET['week'];
    if($week>0) {
        $req = mysqli_query($bdd, "SELECT debut, fin, titre, login, reservations.id FROM reservations
        INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE WEEK(debut)=WEEK(NOW() + INTERVAL $week WEEK)");
    }
    if($week<0) {
        $newweek = substr($week,1);
        $req = mysqli_query($bdd, "SELECT debut, fin, titre, login, reservations.id FROM reservations
        INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE WEEK(debut)=WEEK(NOW() - INTERVAL $newweek WEEK)");
    }
    elseif($week==0) {
        $req = mysqli_query($bdd, "SELECT debut, fin, titre, login, reservations.id FROM reservations
        INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE WEEK(debut)=WEEK(NOW())");
    }  
}
else {
    $req = mysqli_query($bdd, "SELECT debut, fin, titre, login, reservations.id FROM reservations
    INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE WEEK(debut)=WEEK(NOW())");
}

// Résultat de la requête.
$res = mysqli_fetch_all($req, MYSQLI_ASSOC); 
?>