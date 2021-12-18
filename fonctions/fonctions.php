<?php 
// Fonction pour sécuriser les données
function valid_donnees($donnees){
    // trim() va supprimer les espaces inutiles
    $donnees = trim($donnees);
    // stripslashes() va supprimer les antislashes
    $donnees = stripslashes($donnees);
    // htmlspecialchars() va échapper certains caractères spéciaux
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
?>