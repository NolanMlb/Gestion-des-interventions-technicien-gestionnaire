
<?php
    $titre = "Valider une intervention";
    include "../vue/entete.html.php";
    include "../vue/pied.html";
?>

<body>
    <center>
<form action="../controleur/validerIntervention.php" method="POST" style="width:40%;">
    <div class="form-group">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="idIntervention" placeholder="Entrez l'id de la fiche intervention'" name="idI" requiered>
            <label for="floatingInput">Entrez l'id de l'intervention</label>
        </div>
        <div style="text-align:center;">
        <input class="btn btn-primary" type="submit" value = "Valider" style=" width:30%;">
        </div>
    </div>
</form>
    </center>
</body>