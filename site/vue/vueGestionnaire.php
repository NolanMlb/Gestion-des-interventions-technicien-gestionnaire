<?php
   $titre = "Accueil Gestionnaire";
   include "../vue/entete.html.php";
   include "../vue/pied.html";

?>
<body>
   <h1 style="text-align:center;">Que voulez-vous faire ? </h1>

   <br>
   <hr>
   <div style="margin-top:80px;">
      <center><input type="button" onclick="window.location.href='../vue/vueAffecterVisite.html.php'" class="btn btn-primary" value ="Affecter une visite">

      <input type="button" onclick="window.location.href='../vue/vueConsultInter.php'" class="btn btn-primary" value="Consulter une intervention">

      <input type="button" onclick="window.location.href='../vue/vueStatistiques.php'"  class="btn btn-primary" value="Visualisation des statistiques"></center>
   </div>
    
</body>
</html>