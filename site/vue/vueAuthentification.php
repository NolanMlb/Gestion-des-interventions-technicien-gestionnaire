<link rel="stylesheet" href="css/style.css">
<!-- Formulaire de connexion -->
<div style="margin-top:20px;">
    <h1 class="titre" style>CONNECTEZ-VOUS POUR ACCEDER A VOTRE ESPACE </h1>
    <hr>
</div>
    <form action="controleur/connexion.php" method="POST" style="margin-top:50px;">
    <div class="form-group">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="utilisateur" placeholder="Entrez le nom d'utilisateur..." name="utilisateur" requiered>
            <label for="floatingInput">Nom d'utilisateur</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe..." name="password" requiered>
            <label for="floatingPassword">Mot de passe</label>
        </div>
    </div>
    
    <br>
    Test :
    login : DeBruycker<br>
    mdp : DeBruycker<br>
    role : Gestionnaire<br>
    <br><br>
    login : Malherbe<br>
    mdp : Malherbe<br>
    Role : technicien
    <div class="bouton">
        <button type="submit" class="btn btn-outline-primary" name="valider">Valider</button>
    </div>
    </form>