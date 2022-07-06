<?php

    //include les fichiers
    include "../modele/bd.inc.php";
    include "../controleur/connexion.php";
    include "../vue/entete.html";
    include "../vue/pied.html";
    //recuperer l'id
    $id_auto=0;

    //interprétation pour la base de donnée
    $mysqli = new mysqli("localhost", "root", "root", "ap2eme");
    $mysqli -> set_charset("utf-8");
    $requete="INSERT INTO intervention VALUES ($id_auto,'$_POST[dateVisite]','$_POST[heureVisite]','$_POST[idClient]','$_POST[idTechnicien]','$_POST[etatIntervention]','')";
    $resultat = mysqli_query($mysqli,$requete);

    
    // test si la requete est bien faite
    if ($resultat){
        echo"Le rendez-vous a bien été ajouté <br>";
    }
    else{
        echo "Erreur, je n'ai pas reussie à ajouté le rdv !<br> ";
    }
?>
<a href="../vue/vueGestionnaire.php">Retour a la page d'accueil</a>