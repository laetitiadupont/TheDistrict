<?php include 'header.php';?>
<?php include 'db_connect.php';
// ... code de connexion à la base ...
$requete = $db->prepare("select * from plat where id_categorie=? ");
$requete->execute(array($_GET["id_categorie"]));
$id = $requete->fetch(PDO::FETCH_OBJ);
?>
<div class="text-light container-fluid">
    <!---------------------------------------------- boucle bdd ---------------------------------------------->
    <div class="col-12 row">
        <?php foreach ($requete as $plats): ?>
            <div class="col-6">
                <h1><?= $id->libelle ?></h1>
                <img class="w-50" src="images\food\<?= $id->image ?>" alt=""> 
                <p>Description : <?= $id->description ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <!---------------------------------------------- fin de boucle bdd ---------------------------------------------->
</div>

<?php include 'footer.php';?>