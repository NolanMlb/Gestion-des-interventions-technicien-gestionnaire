<?php
   $titre = "Consulter une intervention";
   include "../vue/entete.html.php";
   include "../vue/pied.html";
?>


<!--Partie html-->
<body>
   <h1 style="text-align:center;">Pour quel technicien ? </h1>
   <hr>

   <div style="margin-top:70px">
      <center><input type="button" onclick="window.location.href='../controleur/consultIntervention.php?id=1'" id='1' class="btn btn-primary" value="Thomas Ribeiro">

      <input type="button" onclick="window.location.href='../controleur/consultIntervention.php?id=2'" id='2' class="btn btn-primary" value ="Malherbe Nolan">

      <input type="button" onclick="window.location.href='../controleur/consultIntervention.php?id=3'" id='3' class="btn btn-primary" value ="Meyfroot Rayane"></center>
   </div>