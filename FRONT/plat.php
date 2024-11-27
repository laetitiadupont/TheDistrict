<?php include 'header.php';?>
<?php include 'db_connect.php';
// ... code de connexion à la base ...
$requete = $db->prepare("SELECT * FROM plat WHERE id_categorie=? ");
$requete->execute(array($_GET["id_categorie"]));
$id = $requete->fetchAll(PDO::FETCH_OBJ);
?>
<div class="text-light container-fluid">
    <!---------------------------------------------- boucle bdd ---------------------------------------------->
    <div class="col-12 mx-auto row">
        <?php foreach ($id as $plats): ?>
            <div class="col-5 row m-2 p-2 bg-black mx-auto">
                <h1><?= $plats->libelle ?></h1>
                <div class="col-6">
                    
                    <img class="w-100" src="images\food\<?= $plats->image ?>" alt=""> 
                </div>
                <div class="col-6">
                    <p>Description : <?= $plats->description ?></p>
                    <div class="text-center">
                        <a href="commande.php?plat=<?= $plats->id ?>" style="background-color: #970747;" class="btn color_district text-light">Commander</a>
                    </div>
                </div>
                
                
            </div>
        <?php endforeach; ?>
    </div>
    <!---------------------------------------------- fin de boucle bdd ---------------------------------------------->
</div>

<?php include 'footer.php';?>