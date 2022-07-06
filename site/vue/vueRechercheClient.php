<!DOCTYPE html>
<html lang="fr">

<head>
    <title>pdo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<form action="../controleur/rechercheClient.php" method="POST">
    <div class="rechclient">
	Numéro du client : <input type="text" name="numC"/>
    Nom du client : <input type="text" name="nomC"/>
    Prénom du client : <input type="text" name="prenomC"/>
    <input type="submit" value = "Valider"><br>
    </div>
</form>
</html>