<?php

    include "../controleur/connexion.php";
    include "../modele/bd.inc.php";
    include "../vue/entete.html";
    include "../vue/pied.html";

    //Consultation des interventions par technicien  Uniquement possible pour les techniciens, 
    //ils peuvent consulter les interventions qui leurs sont attribuées, les plus proches sont à traiter en priorité.
    
    //récupération de l'id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $mysqli = mysqli_connect("localhost", "root", "root", "ap2eme");
    $rqt = mysqli_query($mysqli,"SELECT idTechnicien, dateVisite, heureVisite, idClient
    FROM INTERVENTION
    WHERE idTechnicien = $id
    ORDER BY dateVisite ASC") or die("Erreur au niveau de la requête");
    
    //interprétation avec html
?>

    <table class="table table-hover" border="1">
    <tr class='table-primary'>
        <th scope='row'>id Technicien</th>
        <th scope='row'>Date Visite</th>
        <th scope='row'>Heure Visite</th>
        <th scope='row'>id Client</th>
    </tr>
<?php

    while($row = mysqli_fetch_array($rqt)){
        echo "<tr>";
        echo "<td>".$row['idTechnicien'];
        echo "<td>".$row['dateVisite'];
        echo "<td>".$row['heureVisite'];
        echo "<td>".$row['idClient'];
        echo"</tr>";

    }
?>
    <!--definition des id:-->
    <p> id=1 --> Thomas<br>
        id=2 --> Nolan<br>
        id=3 --> Rayane<br>
    </p>
