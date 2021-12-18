<?php 
// Condition pour récupérer le login de l'utilisateur connecté.
if(isset($_SESSION['login'])) {
    $session_login = $_SESSION['login']; 
    $req = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$session_login'");
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
}
?>