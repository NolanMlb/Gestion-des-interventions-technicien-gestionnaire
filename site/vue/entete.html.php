<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?php
        echo"$titre";
        ?></title>
        <meta charset="UTF-8">
        
        <!-- Responsive meta -->
        <meta name="viewport"content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- Lien pour CSS-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">


    <nav class="nvbar">
        <div class="imgcentre">
            <img class="logo" src="../img/vdev.png" width="10%">
        </div>
        <ul class="listecentre">
            <?php
                if(['roleUtilisateur']=='Gestionnaire'){
                echo"<li><a class='navlien' href='../vue/vueGestionnaire.php'>Accueil</a></li>";
                }

                else{
                    echo"<li><a class='navlien' href='../vue/vueTechnicien.php'>Accueil</a></li>";
                }
            ?>

            <li><a class="" href="../vue/vueDeconnexion.php">Déconnexion</a></li>

         </ul>
        
     </nav>
 </head> 

