<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('bdd.php');
// Requête pour récupérer la date du début et fin et le login.
$req = mysqli_query($bdd, "SELECT debut, fin, titre, login, reservations.id FROM reservations
INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id");
// Résultat de la requête.
$res = mysqli_fetch_all($req, MYSQLI_ASSOC); 
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
?>