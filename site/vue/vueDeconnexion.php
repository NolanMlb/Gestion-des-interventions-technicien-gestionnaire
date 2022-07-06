<link rel="stylesheet" href="../css/style.css">
<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "../modele/authentification.inc.php";

// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees

                

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "authentification";
include "../vue/vueAuthentification.php";
include "../vue/pied.html";


?>