<?php include 'header.php';?>
<?php include 'db_connect.php';
// ... code de connexion à la base ...
$requete = $db->query("SELECT * FROM categorie");
$requete2 = $db->query("SELECT * FROM plat");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$tableau2 = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
?>
<!--------------------------------------- banniere / recherche ----------------------------------------->
<div class="banniere_cat parallax" >
        <div class="col-6"></div>
</div>            
        <!--------------------------------------- categorie ----------------------------------------->
        
<div id="menu-categorie" class="container-fluid row mt-4 mx-auto">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
  <h2 class="text-light pb-4"> Découvrez les plats du restaurant :</h2>
    <div class="row">
      <div class="col-8">
          <select name="search" class="form-select bg-dark text-light fs-2" aria-label="Default select example">
            <?php foreach ($tableau as $cat): ?>
              <option class="bg-dark text-light fs-2" value="<?= $cat->id ?>"><?= $cat->libelle ?></option>
            <?php endforeach; ?>
          </select>
      </div>
      <div class="col-4">
          <button class="text-light color_district p-3 rounded-start" type="submit">Rechercher</button>
      </div>
    </div>
</form>

        
<!---------------------------------------------- boucle bdd ---------------------------------------------->

<!------------------------ A REVOIR POUR AFFICHER LA SELECTION PLAT A PARTIR DE CATEGORIE SELECT (pt etre JOIN table) ------------------------------------->
      <?php

      $search = filter_input(INPUT_POST, 'search');
      $requete2 = $db->query("SELECT * FROM plat where id_categorie=".$search);
      $plats = $requete2->fetchAll(PDO::FETCH_OBJ);
      ?>

      <?php if ($search) : ?>
        <!-- boucle plats -->

        <div class="col-12 row text-light p-4">
        <?php foreach ($plats as $afficher => $key): ?>
          <div class="col-5 row rounded m-1 bg-black p-0">
            <div class="col-5 p-0">
              <img src="images/food/<?= $key->image ?>" class="mini rounded-start p-2" >
            </div>
            <div class="col-7">
              <h3 class="card-title pt-2 pb-2"><?= $key->libelle ?></h3>
              <p class="card-text justify-text h-25"><?= $key->description ?></p>
              <p class="card-text fs-2  text-center"><?= $key->prix . " €"?></p>
              <a href="plats.php" class="btn m-4 w-50 color_district text-center text-light" style="background-color: #970747;">Commander</a>
            </div>
          </div>        
        <?php endforeach; ?>
        </div>
            
      <?php else : ?>

          <p class="text-light fs-1">Aucuns plats trouver Oups... !</p>

      <?php endif ?>



      
<!---------------------------------------------- fin de boucle bdd ---------------------------------------------->
</div>
<div class="myBouton row justify-content-center text-center p-4">
  <div class="col-4 btn-nav">
    <a href="" class="btn col-6 text-light border border-light">Précedent</a>
  </div>
  <div class="col-4 btn-nav">
    <a href="" class="btn col-6 text-light border border-light">Suivant</a>
  </div>
</div>
<!----------------------------------------------------- footer -------------------------------------------------->


<?php include 'footer.php';?>