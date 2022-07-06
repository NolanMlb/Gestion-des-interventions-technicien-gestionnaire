<?php

    include "../controleur/connexion.php";
    include "../modele/bd.inc.php";
    include "../vue/entete.html";
    include "../vue/pied.html";

    if(isset($_POST["mois"])){
    if(empty($_POST['mois'])){
        echo "Vous n'avez pas saisi de mois";
    }
    else{
    $mysqli = mysqli_connect("localhost", "root", "root", "ap2eme");
    $nbInterventions = mysqli_query($mysqli,"SELECT technicien.idTechnicien, matricule, nom, prenom, telTechnicien, COUNT(intervention.idTechnicien) AS nbInterventions, SEC_TO_TIME(SUM(TIME_TO_SEC(validerIntervention.tempsPasse))) AS 'tpasse'
    FROM technicien, intervention, validerIntervention
    WHERE technicien.idTechnicien = intervention.idTechnicien
    AND intervention.idIntervention = validerIntervention.idIntervention
    AND dateVisite like '%" . $_POST["mois"]. "%'
    GROUP BY technicien.idTechnicien") or die("Erreur au niveau de la requête");
    $nbResult = mysqli_num_rows($nbInterventions);
        if($nbResult > 0){
    
?>

    <table class="table table-hover" border="1">
        <h1> Nombre d'interventions par technicien </h1>
    <tr class='table-primary'>
        <th scope='row'>id Technicien</th>
        <th scope='row'>Matricule</th>
        <th scope='row'>Nom</th>
        <th scope='row'>Prénom</th>
        <th scope='row'>N°tel</th>
        <th scope='row'>Nombre d'interventions</th>
        <th scope='row'>Temps passé sur les interventions</th>
    </tr>
<?php

    while($row = mysqli_fetch_array($nbInterventions)){
        echo "<tr>";
        echo "<td>".$row['idTechnicien'];
        echo "<td>".$row['matricule'];
        echo "<td>".$row['nom'];
        echo "<td>".$row['prenom'];
        echo "<td>".$row['telTechnicien'];
        echo "<td>".$row['nbInterventions'];
        echo "<td>".$row['tpasse'];
        echo"</tr>";

    }
}else{
    echo "<p> Aucun résultat ne correspond à votre recherche.</p>";
}
}
}

?>