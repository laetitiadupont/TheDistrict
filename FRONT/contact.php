<?php include 'header.php';?>

            <!-- banniere -->
            <div class="banniere_contact parallax"></div>        


<!-- formulaire -->

<form class="container p-4" action="valid_form_contact.js" method="post" id="form">
    <fieldset class="col-md-10 mx-auto">
        <legend class="text-light">Contact</legend>
        <div class="col row mb-3">
            <div class="row">
                <div class="col-md-6 p-4">
                    <label for="name" class="form-label text-light">Nom :</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Votre Nom..." required>
                </div>
                <div class="col-md-6 p-4">
                    <label for="prenom" class="form-label text-light">Prénom :</label>
                    <input id="prenom" name="prenom" type="text" class="form-control" placeholder="Votre Prénom..." required>
                </div>
                <div class="col-md-12 p-4">
                    <label for="email" class="form-label text-light">Email :</label>
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email..." required>
                </div>
                <div class="col-md-12 p-4">
                    <label for="comment" class="form-label text-light">Votre Message :</label>
                    <textarea name="comment" class="form-control" id="comment" rows="3" required></textarea>
                </div>
            </div>
        </div>
        <div class="btn-nav text-center">
            <input class="btn col-4 text-light border border-light" type="submit" name="submit" id="submit" value="Envoyer">
        </div>
    </fieldset>
</form>


<?php include 'footer.php';?>