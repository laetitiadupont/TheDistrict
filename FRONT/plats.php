<?php include 'header.php'; ?>
<?php include 'db_connect.php';
// ... code de connexion à la base ...
$requete = $db->query("SELECT * FROM plat");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
?>

  <div class="container-fluid">

      <!---------------------------------------------- boucle bdd  plats ---------------------------------------------->
      <div class="col-12 row  mx-auto">
        <?php foreach ($tableau as $plats): ?>
          <div class="col-6 mt-2 mb-2 ">
            <div class="row p-2">
              <div class="col-5 p-0">
                <img src="images\food\<?= $plats->image ?>" class="mini" alt="">
              </div>
              <div class="col-7 bg-black ">
                <h2 class="text-light pt-2 pb-2"><?= $plats->libelle ?></h2>
                <p class="justify-text text-light"><?= $plats->description ?></p>
                <p class="text-center fs-2 text-light"><?= $plats->prix . " €" ?></p>
                <div class="text-center">
                  <a href="commande.php?plat=<?= $plats->id ?>" style="background-color: #970747;" class="btn color_district text-light">Commander</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!---------------------------------------------- fin de boucle bdd ---------------------------------------------->
  </div>

<?php include 'footer.php'; ?>