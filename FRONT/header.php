<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Spicy+Rice&display=swap" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
  <title>The District</title>
</head>

<body class="body bg-dark">
  <?php
  session_start();
  ?>
  <header>
    <!-- NAVBAR -->

    <nav id="nav" class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img class="" src="images/the_district_brand/logo_transparent.png" width="128" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <div class="blocknav green borderXwidth">
            <a href="index.php" class="text-light fs-3">ACCUEIL</a>
            <a href="categories.php" class="text-light fs-3">CATEGORIES</a>
            <a href="plats.php" class="text-light fs-3">PLATS</a>
            <a href="contact.php" class="text-light fs-3">CONTACT</a>
            <a href="commande.php" class="text-light fs-3">COMMANDE</a>

            <!-- MODAL CONNEXION -->

            <!-- <a href="" class="text-light fs-3" data-bs-toggle="modal" data-bs-target="#exampleModal">SE CONNECTER</a> -->

            <!-- Modal -->

            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Connexion</h1>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="login.php" method="post">
                      <div class="mb-3 text-end">
                        <label for="exampleFormControlInput1" class="form-label">Email : </label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" required>
                      </div>
                      <div class="col-auto text-end">
                        <label for="inputPassword6" class="col-form-label">Mot de passe :</label>
                      </div>
                      <div class="col-auto">
                        <input type="password" name="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" required>
                      </div>
                      <div class="mt-2">
                        <a href="register.php" class="text-dark mt-4">Pas encore inscrit ? Je m'inscris !</a>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Connexion</button>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- FIN MODAL -->
          </div>
        </div>
      </div>
    </nav>

  </header>