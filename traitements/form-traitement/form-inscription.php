<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('../page-traitement/bdd.php');
// Require pour pouvoir utiliser les fonctions.
require ('../../fonctions/fonctions.php');
// Traitement avant de récupérer les données utilisateurs.
if(isset($_POST['button'])) {
    // Sécurisé mes données avec la fonction valid_donnees. 
    $login = valid_donnees($_POST["login"]);
    $password = valid_donnees($_POST["password"]);
    $password2 = valid_donnees($_POST["password2"]);
    // Requête pour savoir si le login existe déja.
    if(isset($login) && isset($password)) {
        $req = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
        // Vérification pour voir si les champs sont vides et msg d'erreur.
        if(empty($login)) {
            header("Location: ../../view/inscription.php?err=emptylogin");
        }
        elseif(mysqli_num_rows($req)) {
            header("Location: ../../view/inscription.php?err=loginexit");
        }
        elseif(empty($password)) {
            header("Location: ../../view/inscription.php?err=emptymdp");
        }
        elseif(empty($password2)) {
            header("Location: ../../view/inscription.php?err=emptymdp2");
        }
        elseif($password != $password2) { 
            header("Location: ../../view/inscription.php?err=mdpnotidem");
        } 
        else {
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $hashed_password = valid_donnees(password_hash($password, PASSWORD_DEFAULT));
            mysqli_query($bdd, "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login', '$hashed_password')");
            header("Location: ../../view/connexion.php?msg=insreussie");
        }  
    }
}

?>