<?php

/*
Page: connexion.php
*/
//à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION


//si le bouton "Connexion" est cliqué
if(isset($_POST['valider'])){
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['utilisateur'])){
        
        include "../vue/pied.html";
        include "../modele/bd.inc.php";
        echo "Le champ Pseudo est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['password'])){
            
            include "../vue/pied.html";
            include "$/modele/bd.inc.php";
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs pseudo & mdp sont bien postés et pas vides, on sécurise les données entrées par l'utilisateur
            //le htmlentities() passera les guillemets en entités HTML, ce qui empêchera en partie, les injections SQL
            $Pseudo = htmlentities($_POST['utilisateur'], ENT_QUOTES, "UTF-8"); 
            $MotDePasse = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
            //on se connecte à la base de données:
            $mysqli = mysqli_connect("localhost", "root", "root", "ap2eme");
           

            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                
                include "../vue/pied.html";
                include "../modele/bd.inc.php";
                echo "Erreur de connexion à la base de données.";
            } else {
                
                $MotDePasse = hash("sha1", $MotDePasse);
               
                //on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
                $Requete = mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE nomUtilisateur = '".$Pseudo."' AND mdpUtilisateur = '".$MotDePasse."'");
                //si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                //si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                if(mysqli_num_rows($Requete) == 0) {
                   
                    include "../vue/pied.html";
                    include "../modele/bd.inc.php";
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                
                  
                } else{
                    $_SESSION['pseudo'] = $Pseudo;
                    $RequeteRole="SELECT roleUtilisateur FROM utilisateur WHERE nomUtilisateur ='".$Pseudo."' AND mdpUtilisateur = '".$MotDePasse."'";
                    $resultat = mysqli_query($mysqli,$RequeteRole);

                    while($row = mysqli_fetch_assoc($resultat)){
                        if($row['roleUtilisateur']=='Technicien'){
                            include "../vue/vueTechnicien.php";
                            include "../vue/pied.html";
                        }
                        else{
                            include "../vue/vueGestionnaire.php";
                            include "../vue/pied.html";
                        }
                    }
                    //on ouvre la session avec $_SESSION:
                    //la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                    
                    //echo "Vous êtes à présent connecté !";
                    exit();
                }
            }
        }
    }
}
?>
</html>