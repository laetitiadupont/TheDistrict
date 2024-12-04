<?php
include 'header.php';
include 'db_connect.php';
require_once("DAO.php");
?>
<div class="container">
    <h1 class="h1 text-center mt-5 text-light">Formulaire d'inscription</h1>
    <form action="scripts/add_user.php" method="post" class="form text-light col-6 mx-auto m-5">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="prenom" class="form-label">Votre Prénom :</label>
                <input type="name" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="mb-3 col-6">
                <label for="nom" class="form-label">Votre Nom :</label>
                <input type="name" class="form-control" id="nom" name="nom">
            </div>
        </div>
        <div class="mb-3 ">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>

        <div class="mb-3 ">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 ">
            <label for="password2" class="form-label">Confirmer le mot de passe :</label>
            <input type="password" class="form-control" id="password2" name="password2">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider mon inscription</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Retour</button>
        </div>
    </form>
</div>
<?php include 'footer.php'; ?>