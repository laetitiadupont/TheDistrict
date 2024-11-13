<?php include 'header.php';?>
<div class="bg-dark">
        <!--------------------------------------- banniere / recherche ----------------------------------------->
        <div class="banniere_plats parallax" ></div>            
        

        <!--------------------------------------- produit/s ----------------------------------------->
        
        <div class="container col-6 mt-4">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2 p-2">
                    <img src="images/food/thumbnails/burger1.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6 p-4">
                    
                    <h5 class="card-title">Cheeseburger</h5>
                    <p class="card-text">Savoureux burger et son fromage fondant ! </p>
                    <form action="/action_page.php">
                        <label for="quantity">Quantity (maximum 10):</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="10">                        
                    </form>
                    
                </div>
            </div>
          </div>
        </div>

        
        <form class="container p-4" action="valid_commande.php" method="post" id="form" onSubmit="return checkForm(this);">
    <fieldset class="col-md-10 mx-auto">
        <div class="col row mb-3">
            <div class="row">
                <div class="col-md-6 p-4">
                    <label for="name" class="form-label text-light">Nom :</label>
                    <input id="name" name="name" type="name" class="form-control" placeholder="Votre Nom..." required>
                    <p class="errname"></p>
                </div>
                <div class="col-md-6 p-4">
                    <label for="prenom" class="form-label text-light">Prénom :</label>
                    <input id="prenom" name="prenom" type="prenom" class="form-control" placeholder="Votre Prénom..." required >
                    <p class="errprenom"></p>
                </div>
                <div class="col-md-12 p-4">
                    <label for="adresse" class="form-label text-light">Email :</label>
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email..." required >
                    <p class="erremail"></p>
                </div>
                <div class="col-md-12 p-4">
                    <label for="adress" class="form-label text-light">Votre adresse :</label>
                    <textarea name="adress" class="form-control" id="adress" rows="3" required></textarea>
                    <p class="erradress"></p>
                </div>
            </div>
        </div>
        <div class=" btn-nav text-center">
            <input class="btn col-4 text-light border border-light" type="submit" name="submit" id="submit" value="Envoyer">
        </div>
    </fieldset>
</form>
        
</div>
<?php include 'footer.php';?>