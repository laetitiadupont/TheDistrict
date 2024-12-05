<?php
include 'header.php';
include 'db_connect.php';
require_once("DAO.php");
?>
<div class="bg-dark">
    <!-- banniere / recherche -->
    <div class="banniere_plats parallax">

    </div>


    <!-- produit/s -->
    <h1 class="text-center fs-1 text-light p-5">C O M M A N D E</h1>
    <div class="container mx-auto text-light">
        <?php
        $id_comm = $_GET['id'] ?? 7;
        $commande = getCommande($id_comm, $db);
        foreach ($commande as $plat => $key): ?>
            <div class="col-8 row m-2 p-2 bg-dark mx-auto rounded border border-4">
                <h1><?= $key->libelle ?></h1>
                <div class="col-6">
                    <img class="w-100" src="images\food\<?= $key->image ?>" alt="">
                </div>
                <div class="col-6">
                    <p>Description : <?= $key->description ?></p>
                    <label for="quantite">Quantité : </label>
                    <input type="number" id="quantity" name="quantity" min="1" max="10" placeholder="<?= $key->quantite ?>">
                </div>
            </div>

            <div class="col-8 row mx-auto mt-4">
                <h2 class="bold">Informations de livraison :</h2>
                <div class="col-6 pt-4 fs-3">
                    <p>Date de la commande :</p>
                    <p>Etat de la commande : </p>
                    <p>Nom : </p>
                    <p>Email : </p>
                    <p>Adresse : </p>
                </div>
                <div class="col-6 pt-4 fs-3">
                    <p><?= $key->date_commande ?></p>
                    <p><?php

                        $a = $key->etat;

                        switch ($a) {
                            case 'En cours de livraison':
                                echo '<p class="text-success">' . $a . '...</p>';
                                break;

                            case 'En préparation':
                                echo '<p class="text-info">' . $a . '...</p>';
                                break;

                            case 'Annulée':
                                echo '<p class="text-danger">' . $a . '</p>';
                                break;
                            case 'Livrée':
                                echo '<p class="text-success">' . $a . '</p>';
                                break;
                        }

                        ?></p>
                    <p><?= $key->nom_client ?></p>
                    <p><?= $key->email_client ?></p>
                    <p><?= $key->adresse_client ?></p>
                </div>
            </div>

        <?php endforeach; ?>
        <div class="text-center mb-4">
            <!-- <button type="submit" class="btn btn-primary">Valider ma commande</button> -->
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Retour</button>
        </div>
    </div>



</div>
<?php include 'footer.php'; ?>