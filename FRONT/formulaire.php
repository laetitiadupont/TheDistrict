<?php include 'header.php';?>

            <!--------------------------------------- banniere ----------------------------------------->
            <div class="banniere_contact parallax"></div>        


<!--------------------------------------- affiche informations formulaire ----------------------------------------->

<div class="container text-light"> 
<h2 class="text-center p-4">Votre Message a bien été envoyé !</h2>

<?php
// define variables and set to empty values
$name = $prenom = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $prenom = test_input($_POST["prenom"]);
    $email = test_input($_POST["email"]);
  $comment = test_input($_POST["comment"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
  <div class="col-6 mx-auto p-4">
    <p>Nom : <?php echo $name; ?></p>
    <p>Prénom : <?php echo $prenom; ?></p>
    <p>Email : <?php echo $email; ?></p>
    <p>Votre message : <br> <?php echo $comment; ?></p>
  </div>

</div>


<?php include 'footer.php';?>
