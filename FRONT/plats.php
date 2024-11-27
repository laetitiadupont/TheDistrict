<?php 
include 'header.php';  
include 'db_connect.php';
require_once ('DAO.php')

?>

  <div class="container-fluid">
    <h1 class="text-light mt-4">Découvrez tous nos plats :</h1>
      <!---------------------------------------------- boucle bdd  plats ---------------------------------------------->
      <div class="col-12 row  mx-auto">
        <?php 
        $plats = getPlats($db);
        foreach ($plats as $plat): ?>
          <div class="col-6 mt-2 mb-2 ">
            <div class="row p-2">
              <div class="col-5 p-0">
                <img src="images\food\<?= $plat->image ?>" class="mini" alt="">
              </div>
              <div class="col-7 bg-black ">
                <h2 class="text-light pt-2 pb-2"><?= $plat->libelle ?></h2>
                <p class="justify-text text-light"><?= $plat->description ?></p>
                <p class="text-center fs-2 text-light"><?= $plat->prix . " €" ?></p>
                <div class="text-center">
                  <a href="commande.php?plat=<?= $plat->id ?>" style="background-color: #970747;" class="btn color_district text-light">Ajouter</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!---------------------------------------------- fin de boucle bdd ---------------------------------------------->
  </div>

<?php include 'footer.php'; ?>