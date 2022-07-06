<?php
    //Uniquement possible pour les techniciens (gestion d’accès), 
    //le technicien pourra voir la liste des interventions par date ou par agent 
    //et par la suite éditer la fiche intervention.
    
    include "../vue/entete.html";
    include "../vue/pied.html";
    $mysqli = mysqli_connect("localhost", "root", "root", "ap2eme");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if ($id = 1){
            $rqt = mysqli_query($mysqli,"SELECT * FROM intervention ORDER BY dateVisite DESC") or die("Erreur au niveau de la requête");
            echo "<table class='table table-hover' border ='1'>
            <tr class='table-primary'>
            <th scope='row'>  ID Intervention  </th>
            <th scope='row'>  Date de la vitite  </th>
            <th scope='row'>  Heure de la visite  </th>
            <th scope='row'>  ID client  </th>
            <th scope='row'>  ID technicien  </th>
            </tr>";

        while($row = mysqli_fetch_array($rqt)){
            echo "<tr><br>";
            echo "<td>".$row['idIntervention'] . "</td>";
            echo "<td>".$row['dateVisite'] . "</td>";
            echo "<td>".$row['heureVisite'] . "</td>";
            echo "<td>".$row['idClient'] . "</td>";
            echo "<td>".$row['idTechnicien'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        }

        else if ($id = 2){
            $rqt = mysqli_query($mysqli,"SELECT * FROM intervention ORDER BY idTechnicien") or die("Erreur au niveau de la requête");
            echo "<table class='table table-hover' border ='1'>
            <tr class='table-primary'>
            <th scope='row'>  ID Intervention  </th>
            <th scope='row'>  Date de la vitite  </th>
            <th scope='row'>  Heure de la visite  </th>
            <th scope='row'>  ID client  </th>
            <th scope='row'>  ID technicien  </th>
            </tr>";

        while($row = mysqli_fetch_array($rqt)){
            echo "<tr><br>";
            echo "<td>".$row['idIntervention'] . "</td>";
            echo "<td>".$row['dateVisite'] . "</td>";
            echo "<td>".$row['heureVisite'] . "</td>";
            echo "<td>".$row['idClient'] . "</td>";
            echo "<td>".$row['idTechnicien'] . "</td>";
            echo "<td>".$row['etatIntervention'] . "</td>";
            echo "<td>".$row['commentaire'] . "</td>";
            echo "<td>".$row['tempsPasse'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        }
    }
    
?>