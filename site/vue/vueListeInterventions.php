<?php
    
    include "../modele/bd.inc.php";
    include "../controleur/connexion.php";
    $titre = "Liste des interventions";
    include "../vue/entete.html.php";
    include "../vue/pied.html";
?>
    <!--Partie html-->
    <body>
   <h1 style="text-align:center;">Liste des interventions par:  </h1>
   <hr>

   <div style="margin-top:70px">
      <center><input type="button" onclick="window.location.href='../controleur/listeIntervention.php?id=1'" id='1' class="btn btn-primary" value="Date">

      <input type="button" onclick="window.location.href='../controleur/listeIntervention.php?id=2'" id='2' class="btn btn-primary" value ="Technicien">
      </center>
   </div>