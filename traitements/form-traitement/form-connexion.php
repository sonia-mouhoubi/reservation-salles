<?php 
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
    // Requête qui permet de verifier si le login est bien dans la bdd.
    $req = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    // Vérification pour voir si les champs sont vides et msg d'erreur.
    if(isset($login) && isset($password)) {
        if(empty($login)) {
            header("Location: ../../view/connexion.php?err=emptylogin");
            // exit;
        }
        elseif(empty($password)) {
            header("Location: ../../view/connexion.php?err=emptymdp");
            // exit;
        }
        elseif(!empty($res) && password_verify($password, $res[0]['password'])) {        
            $_SESSION['id'] = $res[0]['id'];
            $_SESSION['login'] = $res[0]['login'];
            header("Location: ../../view/accueil.php?msg=connectreussie");
        } 
        else {
            header("Location: ../../view/connexion.php?err=errlogmdp");  
        }   
    }  
}
?>