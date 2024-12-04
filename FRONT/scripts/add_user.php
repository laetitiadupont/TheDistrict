<?php
include_once '../db_connect.php';
try {
    $name = $_POST['prenom'] . " " . $_POST['nom'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);

    if ($password != $password2) {
        echo '<p class="text-light">Le mot de passe doit correspondre</p>';
    } 

    $stmt = $db->prepare("INSERT INTO utilisateur (nom_prenom, email, password)
        VALUES (:name, :email, :password)");

    $stmt->execute(
        [
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
        ]
    );

} catch (Exception $e) {
    echo 'N° : ' . $e->getCode(), '<br>';
    echo 'Erreur : ' . $e->getMessage() . '<br>';
    die('Fin du script');
}
