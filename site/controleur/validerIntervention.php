<?php
    include "../vue/entete.html";
    include "../modele/bd.inc.php";
    include "../vue/pied.html";
    $mysqli = mysqli_connect("localhost", "root", "root", "ap2eme");
    if (isset($_POST["idI"])){
    $id = $_POST['idI'];
    $resultat = mysqli_query($mysqli,"SELECT * FROM intervention WHERE idIntervention like '%" . $_POST["idI"]. "%'") or die("Erreur au niveau de la requête");
    if($resultat){
        echo"<h1< Intervention : </h1><br>";
        $nbIntervention = mysqli_num_rows($resultat);
        if($nbIntervention > 0){
        echo "<table class='table table-hover' border ='1'>
            <tr class='table-primary'>
            <th scope='row'>  ID Intervention  </th>
            <th scope='row'>  Date de la vitite  </th>
            <th scope='row'>  Heure de la visite  </th>
            <th scope='row'>  ID client  </th>
            <th scope='row'>  ID technicien  </th>
            </tr>";

        while($row = mysqli_fetch_array($resultat)){
            echo "<tr class='table-primary'><br>";
            echo "<td>".$row['idIntervention'] . "</td>";
            echo "<td>".$row['dateVisite'] . "</td>";
            echo "<td>".$row['heureVisite'] . "</td>";
            echo "<td>".$row['idClient'] . "</td>";
            echo "<td>".$row['idTechnicien'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "
        <form  method='POST'>
        <div class='form-group'>
            <div class='form-floating mb-3'>
                id Intervention : <input class='form-control' style='width:20%;' name='idI'><br>
            </div>
            <div class='form-floating mb-3'>
                Etat de l'intervention ('FINIE' ou 'EN COURS') : <input class='form-control' style='width:20%;' type='text' name='etatI'/><br>
            </div>
            <div class='form-floating mb-3'>    
                Commentaires sur l'intervention : <input class='form-control' style='width:20%;' type='text' name='commentaireI'/><br>
            </div>
            <div class='form-floating mb-3'>    
                Temps passé sur l'intervention : <input class='form-control' style='width:20%;' type='text' name='tempsI'/>
            </div>
                <button type='submit' class='btn btn-outline-primary' style='width:10%;' name='save' value='Valider'>Valider</button><br>
        </div>
        </form>
        ";
        $_POST['idI'] = $id;
        if (isset($_POST["save"])){
            $sql="INSERT INTO validerIntervention (idIntervention, etatIntervention, commentaire, tempsPasse) VALUES ('$_POST[idI]','$_POST[etatI]','$_POST[commentaireI]','$_POST[tempsI]')";
            $result = mysqli_query($mysqli, $sql);
            
            if($result){
                echo "Enregistrement effectué";
            } else{
                echo "Erreur :". mysqli_error($mysqli);
            }
        }

        }else{
            echo "<p> Aucun résultat ne correspond à votre recherche.</p>";
        }
    }else{
        echo "erreur dans l'exécution de la requête.<br>";
        echo "Message d'erreur : " . mysqli_error($mysqli);
    }
    }
    
?>