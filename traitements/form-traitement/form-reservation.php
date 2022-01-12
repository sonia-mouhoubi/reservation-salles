<?php
// Initialiser ou récupérer des sessions.
session_start();
// Connexion à la base de donnée.
require ('../page-traitement/bdd.php');
// Require pour pouvoir utiliser les fonctions.
require ('../../fonctions/fonctions.php');

// Requête pour récupérer la date du début.
$req_datedebut = mysqli_query($bdd, "SELECT debut FROM reservations");
// Résultat de la requête.
$res_datedebut = mysqli_fetch_all($req_datedebut, MYSQLI_ASSOC); 

// Requête pour récupérer la date de fin.
$req_datefin = mysqli_query($bdd, "SELECT fin FROM reservations");
// Résultat de la requête.
$res_datefin = mysqli_fetch_all($req_datefin, MYSQLI_ASSOC);

// Traitement avant de récupérer les données utilisateurs.
if(isset($_SESSION['id'])) {
    if(isset($_POST['button'])) {
// Sécurisé mes données avec la fonction valid_donnees.
        $session_id = valid_donnees($_SESSION['id']); 
        $titre = valid_donnees($_POST["titre"]);
        $desc = valid_donnees($_POST["desc"]);
        $datedebut = valid_donnees($_POST["datedebut"]);
        $datefin = valid_donnees($_POST["datefin"]);
// Variable pour le WEEKEND.
        $dateweekend = strtotime($datedebut);
        $dateweekend = date('N', $dateweekend);
// Variable pour interdire de réserver avnt 8h et aprés 19h.
        $heuredebut_inf8h = strtotime($datedebut);
        $heuredebut_inf8h = date('H', $heuredebut_inf8h); 
        $heurefin_sup19h = strtotime($datefin);
        $heurefin_sup19h = date('H', $heurefin_sup19h);
// Variable pour interdire une heure pas entière (version heure).
        // $heure_debut_min = getdate($datedebut);
        // $heure_debut_min = $heure_debut_min['minutes'];        
        // $heure_fin_min = getdate($datefin);
        // $heure_fin_min = $heure_fin_min['minutes'];    
        $heuredebut1h = intval($heuredebut_inf8h);
        $heurefint1h = intval($heurefin_sup19h); 
// Variable pour interdire une heure pas entière (version minute).
        $heure_deb_min = substr($datedebut, 14);
        $heure_debut_min = intval($heure_deb_min);
        $heure_f_min = substr($datefin, 14);
        $heure_fin_min = intval($heure_f_min);

        $date_actuelle = date('d-m-Y');
        $date_actuelle = strtotime($date_actuelle);
        $date_user = substr($datedebut, 0, -6);
        $date_user = strtotime($date_user);

        var_dump($date_user);
        var_dump($date_actuelle);

        echo $date_user;
    
// Requête pour vérifier s'il y a un évènement déja en BDD.
        $req_event = mysqli_query($bdd, "SELECT * FROM `reservations` WHERE debut BETWEEN '$datedebut' AND '$datefin' OR fin BETWEEN '$datedebut' AND '$datefin'");
// Résultat de la requête.
        $res_event = mysqli_fetch_all($req_event, MYSQLI_ASSOC);
// Condition pour pouvoir insérer les données dans la bdd.      
        if(empty($titre)) {
            header("Location: ../../view/reservation-form.php?err=emptytitre");
        }
        elseif(empty($desc)) {
            header("Location: ../../view/reservation-form.php?err=emptydesc");
        }
        elseif(empty($datedebut)) {
            header("Location: ../../view/reservation-form.php?err=emptydatedebut");
        }
        elseif($date_user>$date_actuelle) {
            header("Location: ../../view/reservation-form.php?err=dateinf");
        }
        elseif($dateweekend==6 || $dateweekend==7) {
            header("Location: ../../view/reservation-form.php?err=weekend");
        }
        elseif($heuredebut_inf8h<8 || $heurefin_sup19h>19) {
            header("Location: ../../view/reservation-form.php?err=errorheure"); 
        }
        elseif($heure_debut_min != 0 || $heure_fin_min != 0) {
            header("Location: ../../view/reservation-form.php?err=errheurefixe");
        }
        elseif($heurefint1h<=$heuredebut1h) {
            header("Location: ../../view/reservation-form.php?err=inf1h"); 
        }
        elseif(empty($datefin)) {
            header("Location: ../../view/reservation-form.php?err=emptydatefin");
        }
        elseif(!empty($res_event)) {
            header("Location: ../../view/reservation-form.php?err=existcreneau");
        }
        else {
            mysqli_query($bdd, "INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre', '$desc', '$datedebut', '$datefin', '$session_id')");
            // header("Location: ../../view/reservation-form.php?msg=reservreussie");
            echo 'bobo';
        }  
    }
}
?>