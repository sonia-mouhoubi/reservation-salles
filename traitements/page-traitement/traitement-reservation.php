<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('bdd.php');

// Si $_GET est vide en repart sur le planning.
if(empty($_GET)) {
    header("Location: planning.php");
}

// Var pour récupérer l'id de l'évènement avec GET.
$res_id = $_GET['id'];

// Requête pour récupérer les infos complètes de la réservation.
$req = mysqli_query($bdd, "SELECT id_utilisateur, login, titre, description, debut, fin FROM reservations
INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE reservations.id = $res_id");
// Résultat de la requête.
$res = mysqli_fetch_all($req, MYSQLI_ASSOC);