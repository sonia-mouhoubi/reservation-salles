<?php 
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('../page-traitement/bdd.php');
// Require pour pouvoir utiliser les fonctions.
require ('../../fonctions/fonctions.php');
// Traitement avant de récupérer les données utilisateurs.
if(isset($_SESSION['login'])) {
    if(isset($_POST['button'])) {
        // Sécurisé mes données avec la fonction valid_donnees.
        $session_login = $_SESSION['login']; 
        $login = valid_donnees($_POST["login"]);
        $password = valid_donnees($_POST["password"]);
        $password2 = valid_donnees($_POST["password2"]);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     
        // Requete pour savoir s'il y a bien un login existant.
        $req2 = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
        $res2 = mysqli_fetch_all($req2, MYSQLI_ASSOC);
        // Si login n'est pas vide.
        if(!empty($login) && $session_login != $login) {
            if(mysqli_num_rows($req2)) {
                header("Location: ../../view/profil.php?err=loginexist");
                die();
            }
            mysqli_query($bdd, "UPDATE utilisateurs SET login ='$login' WHERE login ='$session_login'");
            $_SESSION['login'] = $login;
            header("Location: ../../view/profil.php?msg=modifreussie"); 
            die();
        }
        elseif(empty($login)) {
            header("Location: ../../view/profil.php?err=emptylogin");
            die();
        }
        
        // Si ls champs password ne sont pas vide et que le pass1 = à pass2 on recupère les infos.
        if(!empty($password) && !empty($password2) && $password == $password2) {
            mysqli_query($bdd, "UPDATE utilisateurs SET password ='$hashed_password' WHERE login ='$session_login'");
            header("Location: ../../view/profil.php?msg=modifreussie");  
            die();
        }
        elseif(empty($password)) {
            header("Location: ../../view/profil.php?err=emptymdp");        
            die();
        }
        elseif(empty($password2)) {
            header("Location: ../../view/profil.php?err=emptymdp2");
            die();  
        }
        elseif($password != $password2) { // Si la confirmation du mot de passe n'est pas identique.
            header("Location: ../../view/profil.php?err=notidemmdp");  
            die();
        }  
    }

}

?>