<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('bdd.php');
// Requête pour récupérer l'ID de l'événement.
$req = mysqli_query($bdd, "SELECT id FROM reservations");
$res = mysqli_fetch_all($req, MYSQLI_ASSOC);
var_dump($res);

?>