<?php
   $titre = "Accueil Technicien";
   include "../vue/entete.html.php";
   include "../vue/pied.html";
?>
 
<body>
   <h1 style="text-align:center;">Que voulez-vous faire ? </h1>
   <hr>

   <div style="margin-top:70px">
      <center><input type="button" onclick="window.location.href='../vue/vueListeInterventions.php'" class="btn btn-primary" value="Liste des interventions">

      <input type="button" onclick="window.location.href='../vue/vueRechercheClient.php'" class="btn btn-primary" value ="Rechercher un client" >

      <input type="button" onclick="window.location.href='../vue/vueGenererFiche.html.php'" class="btn btn-primary" value="Générer une fiche d'intervention">

      <input type="button" onclick="window.location.href='../vue/vueConsultInter.php'" class="btn btn-primary" value="Consulter une intervention">

      <input type="button" onclick="window.location.href='../vue/vueValiderIntervention.php'" class="btn btn-primary" value="Valider une intervention"></center>
   </div>
    
</body>
</html>