<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <title> Résultat recherche</title>
    </head>

<body>

<?php
    
    include "../modele/bd.inc.php";
    include "../controleur/connexion.php";
    $mysqli = mysqli_connect("localhost", "root", "root", "ap2eme");
    $resultat = mysqli_query($mysqli,"SELECT * FROM client WHERE numClient like '%" . $_POST["numC"]. "%'", $mysqli) or die("Erreur au niveau de la requête");
    if($resultat){
        echo"<h1< Résultat de la recherche : </h1><br>";
        $nbClient = mysqli_num_rows($resultat);
        if($nbClient > 0){
        echo "<table border ='1'>";
        echo "<tr>";
        echo "<td>Numéro client</th><br>";
        echo "<td>Raison Sociale</th><br>";
        echo "<td>Siren</th><br>";
        echo "<td>codeApe </th><br>";
        echo "<td>Teléphone</th><br>";
        echo "<td>Adresse</th><br>";
        echo "<td>Mail</th><br>";
        echo "<td>Durée Deplacement</th><br>";
        echo "<td>Distance(km)</th><br>";
        echo "<td>Contrat de maintenance</th><br>";
        echo "<td> idAgence </th><br>";
        echo "</tr><br>";

        while($row = mysqli_fetch_array($resultat)){
            echo "<tr><br>";
            echo "<td>".$row['numClient'] . "</td><br>";
            echo "<td>".$row['raisonSocialeClient'] . "</td><br>";
            echo "<td>".$row['sirenClient'] . "</td><br>";
            echo "<td>".$row['codeApeClient'] . "</td><br>";
            echo "<td>".$row['telClient'] . "</td><br>";
            echo "<td>".$row['adresseClient'] . "</td><br>";
            echo "<td>".$row['mailClient'] . "</td><br>";
            echo "<td>".$row['dureeDeplacementClient'] . "</td><br>";
            echo "<td>".$row['distanceKmClient'] . "</td><br>";
            echo "<td>".$row['contratmaintenance'] . "</td><br>";
            echo "<td>".$row['idAgence'] . "</td><br>";
            echo "</tr><br>";
        }
        echo "</table><br>";
        }else{
            echo "<p> Aucun résultat ne correspond à votre recherche.</p>";
        }
    }else{
        echo "erreur dans l'exécution de la requête.<br>";
        echo "Message d'erreur : " . mysql_error($mysqli);
    }
?>

</body>
</html>