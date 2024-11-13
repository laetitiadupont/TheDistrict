<?php include 'header.php';?>
<?php include 'db_connect.php';
// ... code de connexion à la base ...
$requete = $db->query("SELECT * FROM categorie;");
$requeteSearch = $db->query("SELECT * FROM plat ORDER BY id DESC;");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$search = $requeteSearch->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
if (isset($_GET['search']) AND !empty($_GET['search'])) {
    $recherche =htmlspecialchars($_GET['search']);
    $requeteSearch = $db->query('SELECT libelle FROM plat WHERE libelle LIKE "%'.$recherche.'% "ORDER BY libelle DESC;');
}
?>

            <!--------------------------------------- banniere / recherche ----------------------------------------->
            <div class="bandeau img-fluid d-flex align-items-center justify-content-center parallax">            
            <form class="col-8 mx-auto"action="" method="get">
                <video id="background-video" autoplay loop muted poster="">
                
                    <source src="https://videos.pexels.com/video-files/3196176/3196176-hd_1920_1080_25fps.mp4" type="video/mp4">
                  </video>
                    <div class="col-6 text-center  mx-auto">
                        <input name="search" class="form-control" type="search" placeholder="Rechercher..." aria-label="Search">                    
                        <button name="submit" class="btn btn-secondary mt-4" type="submit">Rechercher</button>
                    </div>
                    <section>
                        <?php
                            if ($requeteSearch->rowCount() > 0) {
                                while ($plat = $requeteSearch->fetch()) {
                                    ?>
                                    <p><?= $plat['libelle']?></p>
                                    <?php
                                }
                            } else {
                                ?>
                                <p class="text-center">Aucun résultat trouvé.</p>
                                <?php
                            }
                            
                        ?>
                    </section>
                
                
            </form>        
        </div> 
        <!--------------------------------------- nav categories index ----------------------------------------->
        
        <div class="bg-dark">
            <div class="text-light">
                <div class="container p-4">
                <h2> Découvrez la carte des plats succulents du restaurant </h2>                    
                    <p>Nous nous assurons régulièrement de la qualité des produits et des ingrédients. 
                    Découvrez dès maintenant les plats et <a class="colortxt_district" href="plats.html">commandez</a> sur notre site ou en restaurant.</p>
                    <p>Vous pouvez également prendre contact avec le restaurant et réservez une table !</p>
                </div>
            </div>
            <div class="container text-center p-4"> 
                    <div id="menu-cat" class="row col-12">
                        <!---------------------------------------------- boucle bdd ---------------------------------------------->
                        <?php foreach ($tableau as $cat): ?>                            
                            <div class="col-4 mb-4 text-light">
                                <h3 class="fs-1"><?= $cat->libelle ?></h3>                      
                                <a class="nav-link" href="plat.php?id_categorie=<?= $cat->id ?>">
                                    <div class="position-relative">
                                                        
                                        <img class="zoomimg" src="images/category/thumbnails/thumbnails<?= $cat->id ?>.png" alt="<?= $cat->libelle ?>">
                                    </div>
                                </a>                        
                            </div>
                        <?php endforeach; ?>
                        <!---------------------------------------------- fin de boucle bdd ---------------------------------------------->

                    </div>
                
            </div>

            <div id="etab_index" class="container text-light text-center">
                <h3 class="fs-2 p-2">Pourquoi venir dans notre établissement de restauration rapide ?</h3>
                <div class="row align-items-start p-4">
                  <div class="col">
                    <p class="fs-5">Produits Frais </p>
                    <img class="w-25" src="images/vegetable.png" alt="">
                  </div>
                  <div class="col">
                    <p class="fs-5">Sur place ou commander en ligne </p>
                    <img class="w-25" src="images/shopping-basket.png" alt="">
                  </div>
                  <div class="col">
                    <p class="fs-5">Convivialité et écoute </p>
                    <img class="w-25" src="images/chat.png" alt="">
                  </div>
                </div>
              </div>
        

        <!-------------------------------------- slider ----------------------------------------------->
        <div>
            <div class="slider-container slider-1">
                <div class="slider">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/burger1.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/food1.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/pasta1.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/pizza1.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/burger2.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/food2.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/pasta2.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/pizza2.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/burger3.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/food2.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/salad1.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/wrap2.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/burger4.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/food3.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/pasta2.png" alt="">
                    <img class="img-fluid w-25 m-0 p-0" src="images/food/thumbfood/wrap2.png" alt="">
                </div>
            </div>
        </div>
    </div>


<?php include 'footer.php';?>