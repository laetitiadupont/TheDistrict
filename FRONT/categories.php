<?php 
include 'header.php';
include 'db_connect.php';
require_once ('DAO.php');
?>
<!-- banniere / recherche -->
<div class="banniere_cat parallax" >
        <div class="col-6"></div>
</div>            
<!-- categorie -->
        
<div id="menu-categorie" class="container-fluid mt-4 mx-auto">
<h1 class="text-light p-4">Une envie particulière, c'est par ici !</h1>

  <ul class="container nav justify-content-center">
    <?php 
    // requete bdd
    $categories = getCateg($db);
    // boucles affichage des categories
    foreach ($categories as $cat): ?>
      <li class="nav-link text-dark fs-4 col bg-light m-1 rounded-4 text-center border border-info border-5 p-0 button btn-animate">
        <a href="categories.php?id=<?= $cat->id ?>"  aria-current="page" class="nav-link align-middle text-dark"><?= $cat->libelle ?></a>
      </li>
    <?php endforeach; ?>
  </ul>      

<?php
$id= $_GET['id'] ?? 4; 
$categories=getPlatsByCat($id, $db);
if (!empty ($id)) : ?>
  <!-- boucle affichage des plats -->
  <div class="col row text-light p-4">
  <?php foreach ($categories as $afficher => $key): ?>
    <div class="col-5 row rounded m-1 bg-black p-0">
      <div class="col-5 p-0">
        <img src="images/food/<?= $key->image ?>" class="mini rounded-start p-2" alt="<?= $key->libelle ?>" >
      </div>
      <div class="col-7">
        <h3 class="card-title pt-2 pb-2"><?= $key->libelle ?></h3>
        <p class="card-text justify-text h-25"><?= $key->description ?></p>
        <p class="card-text fs-2  text-center"><?= $key->prix . " €"?></p>
        <a href="plats.php" class="btn m-4 w-50 color_district text-center text-light" style="background-color: #970747;">Ajouter</a>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
      
  <?php else : ?>

    <p class="text-light text-center p-4 m-4 fs-1">Aucuns plats trouver Oups... !</p>

<?php endif ?>

<!-- fin de boucle bdd -->
</div>
<div class="myBouton row justify-content-center text-center p-4">
  <div class="col-4 btn-nav">
    <a href="" class="btn col-6 text-light border border-light">Précedent</a>
  </div>
  <div class="col-4 btn-nav">
    <a href="" class="btn col-6 text-light border border-light">Suivant</a>
  </div>
</div>
<?php include 'footer.php';?>