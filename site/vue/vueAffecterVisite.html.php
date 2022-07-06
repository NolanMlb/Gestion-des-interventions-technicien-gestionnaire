<?php
    $titre = "Affecter une visite";
    include "../vue/entete.html.php";

?>

<body>
<!--Formulaire pour affecter une visite-->
<h1 class="titre" style="text-align:center;">Prenez rendez-vous facillement et rapidement !</h1><br><br><br>
<center>
<form action="../controleur/affecterVisite.php" method="POST" style="width:40%;">
    <div class="form-group">
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="dateVisite" placeholder="Entrez la date de la visite..." name="dateVisite" requiered>
            <label for="floatingInput">Date de la visite</label>
        </div>
        <div class="form-floating mb-3">
            <input type="time" class="form-control" id="heureVisite" placeholder="Entrez l'heure désirer... " name="heureVisite" requiered>
            <label for="floatingInput">Heure de la visite</label>
        </div>
        <div class="form-floating mb-3">
            <label for="pet-select">Selectionnez le client:</label>
            <SELECT class="form-control" id="idClient" placeholder="Selectionnez le client... " name="idClient" requiered>
                <OPTION>1</OPTION>
                <OPTION>2</OPTION>
                <OPTION>3</OPTION>
                <OPTION>4</OPTION>
            </SELECT>
        </div>
        <div class="form-floating mb-3">
            <label for="pet-select">Selectionnez le technicien:</label>
            <SELECT class="form-control" id="idTechnicien" placeholder="Selectionnez le client... " name="idTechnicien" requiered>
                <OPTION>1</OPTION>
                <OPTION>2</OPTION>
                <OPTION>3</OPTION>
            </SELECT>   
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="etatIntervention" placeholder="L'état de la visite..." name="etatIntervention" requiered>
            <label for="floatingInput">Etat de l'intervention ?</label>
        </div>
        <input class="btn btn-primary" type="submit" value = "Valider" style=" width:30%;">

</div>
</center> 
    </body>

</form>
</html>

