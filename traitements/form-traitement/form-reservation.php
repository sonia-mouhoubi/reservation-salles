<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('../page-traitement/bdd.php');
// Require pour pouvoir utiliser les fonctions.
require ('../../fonctions/fonctions.php');
// Traitement avant de récupérer les données utilisateurs.
if(isset($_SESSION['id'])) {
    if(isset($_POST['button'])) {
        // Sécurisé mes données avec la fonction valid_donnees.
        $session_id = valid_donnees($_SESSION['id']); 
        $titre = valid_donnees($_POST["titre"]);
        $desc = valid_donnees($_POST["desc"]);
        $datedebut = valid_donnees($_POST["datedebut"]);
        $datefin = valid_donnees($_POST["datefin"]);

        if(empty($titre)) {
            header("Location: ../../view/reservation-form.php?err=emptytitre");
        }
        elseif(empty($desc)) {
            header("Location: ../../view/reservation-form.php?err=emptydesc");
        }
        elseif(empty($datedebut)) {
            header("Location: ../../view/reservation-form.php?err=emptydatedebut");
        }
        elseif(empty($datefin)) {
            header("Location: ../../view/reservation-form.php?err=emptydatefin");
        }
        else {
            mysqli_query($bdd, "INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre', '$desc', '$datedebut', '$datefin', '$session_id')");
            header("Location: ../../view/reservation-form.php?msg=reservreussie");
        }  
    }
}
?>