<?php
require_once("db_connect.php");

// afficher les categories populaire sur l'INDEX
function getCatIndex($db)
{
    $query = $db->query("SELECT * FROM categorie WHERE active = 'Yes' LIMIT 6");
    $query->execute();
    $categorie = $query->fetchAll(PDO::FETCH_OBJ);
    return $categorie;
}
// afficher les Catégories - page CATEGORIES
function getCateg($db)
{
    $categ = $db->query("SELECT * FROM categorie WHERE active = 'Yes'");
    $result = $categ->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
// plats par id categorie (Page CATEGORIES)
function getPlatsByCat($cat, $db)
{
    $query = $db->prepare("SELECT * FROM plat WHERE active = 'Yes' AND id_categorie=:cat_id");
    $query->bindParam(':cat_id', $cat, PDO::PARAM_INT);
    $query->execute();
    $platsByCat = $query->fetchAll(PDO::FETCH_OBJ);
    return $platsByCat;
}
// affiche tous les plats (page PLATS)
function getPlats($db)
{
    $query = $db->prepare('SELECT * FROM plat');
    $query->execute();
    $plats = $query->fetchAll(PDO::FETCH_OBJ);
    return $plats;
}
// affiche une commande (commande.php?id=? et user connect A VOIR) PAGE COMMANDE
function getCommande($id, $db)
{
    $query = $db->prepare("SELECT 
    comm.id, comm.quantite, comm.date_commande, comm.etat, comm.nom_client, comm.telephone_client, comm.email_client, comm.adresse_client, 
    plat.id, plat.libelle, plat.description, plat.prix, plat.image
    FROM commande AS comm 
    JOIN plat ON plat.id = comm.id_plat WHERE comm.id=$id");
    $query->execute();
    $commande = $query->fetchAll(PDO::FETCH_OBJ);
    return $commande;
}
// connexion user
function getUser($db, $email, $password)
{
    // Échappement des données utilisateur (utilisation de paramètres préparés)
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparation de la requête avec des paramètres liés pour éviter l'injection SQL
    $query = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email AND password = :password");
    $query->bindParam(':email', $email);
    $query->bindParam(':password', md5($password));  // N'oublie pas que c'est peut-être une bonne idée de hasher le mot de passe avec MD5 ou bcrypt
    $query->execute();

    // Récupération du résultat
    $result = $query->fetchAll(PDO::FETCH_OBJ);

    // CONDITION IF pour vérifier si un utilisateur a été trouvé
    if (!empty($result)) {
        // Connexion réussie
        echo '<p class="text-success fs-2 text-center">Connexion réussie !</p>';
        // Redirection vers une autre page, par exemple dashboard.php
        header('Location: dashboard.php');  // Assurez-vous d'utiliser une page appropriée
        exit();
    } else {
        // Connexion échouée : message d'erreur
        echo '<p class="text-danger fs-2 text-center">Email ou mot de passe invalide !</p>';
    }
}

//////////////////////////////////////////////////// TEST AUTHENTIFICATION ///////////////////////////////////////////////////////////

function authenticateUser($db, $email, $password)
{
    // Échappement des données utilisateur pour éviter les injections SQL
    $email = htmlspecialchars($email);

    // Préparation de la requête pour récupérer l'utilisateur en fonction de l'email
    $query = $db->prepare("SELECT * FROM utilisateur WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();

    // Récupération du résultat
    $user = $query->fetch(PDO::FETCH_OBJ);

    // Vérification de l'existence de l'utilisateur et comparaison du mot de passe
    if ($user && password_verify($password, $user->password)) {
        // Connexion réussie, on démarre la session et on redirige
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['email'] = $user->email;
        echo '<p class="text-success fs-2 text-center">Connexion réussie !</p>';
        header('Location: dashboard.php'); // Page après la connexion réussie
        exit();
    } else {
        // Connexion échouée : message d'erreur
        echo '<p class="text-danger fs-2 text-center">Email ou mot de passe invalide !</p>';
    }
}


//////////////////////////////////////// REQUETES D'INTERROGATION DE LA BDD ////////////////////////////////////////

// 1. Liste des Commande affichant la date, le client, le plat et le prix
function getCommandes($db)
{
    $query = $db->prepare("SELECT comm.id, comm.quantite, comm.date_commande, comm.etat, comm.nom_client, comm.telephone_client, comm.email_client, comm.adresse_client, 
    plat.id, plat.libelle, plat.description, plat.prix, plat.image
    FROM commande AS comm JOIN plat ON plat.id = comm.id_plat");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

// 2. Liste des plats avec leur categories
function getPlatsCat($db)
{
    $query = $db->prepare("SELECT plat.libelle, cat.libelle FROM plat JOIN categorie AS cat ON plat.id_categorie = cat.id");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

// 3. Liste des categories avec le nombre de plats actifs
function getCatActif($db)
{
    $query = $db->prepare("SELECT libelle, COUNT(active) FROM plat WHERE active = 'yes'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

// 4. Liste des plats les plus vendus (ordre decroissant)
function getPlatsVendu($db)
{
    $query = $db->prepare("SELECT plat.id AS id_plat, plat.libelle, SUM(comm.quantite) AS total_vendu FROM plat 
JOIN      commande AS comm  ON plat.id = comm.id_plat GROUP BY plat.id, plat.libelle ORDER BY total_vendu DESC;");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

// 5. Plats les plus remunerateur
function getPlatsRemu($db)
{
    $query = $db->prepare("SELECT plat.id AS id_plat, plat.libelle, SUM(plat.prix * comm.quantite) AS revenu_total 
    FROM plat 
JOIN commande AS comm ON plat.id = comm.id_plat 
GROUP BY plat.id, plat.libelle 
ORDER BY revenu_total DESC;");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
// 6. Liste des clients et chiffre d'affaires généré (ordre décroissant)
function getClientsChiffre($db)
{
    $query = $db->prepare("SELECT nom_client, SUM(commande.quantite * plat.prix) AS chiffre_affaires
FROM commande JOIN plat ON commande.id_plat = plat.id
GROUP BY nom_client ORDER BY chiffre_affaires DESC");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
}


////////////////////////////////////// ECRIRE DES REQUETES DE MODIFICATION DE LA BDD: ////////////////////////////////////////

// 1.Ecrivez une requête permettant de supprimer les plats non actif de la base de données
function deletPlatsNonActif($db)
{
    $query = $db->prepare('DELETE FROM plat WHERE active = "No"');
    $result = $query->execute();
    return $result;
}

// 2.Ecrivez une requête permettant de supprimer les commandes avec le statut livré
function deletPlatsLivre($db)
{
    $query = $db->prepare('DELETE FROM commande WHERE etat = "Livrée"');
    $result = $query->execute();
    return $result;
}

// 3.Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et un plat dans cette nouvelle catégorie.
function newCat($db)
{
    $query = $db->prepare("INSERT INTO categorie (id, libelle, image, active) values (15,'dessert','mousse.jpg','No');
    // insert into categorie (id, libelle, image, active) values (15,'dessert','mousse.jpg','No')");
    // $result = $query->fetchAll(PDO::FETCH_OBJ);
    // $query-> execute();

}
// 3.NOUVEAU PLAT
function newPlat($db)
{
    $query = $db->prepare("INSERT INTO plat (id, libelle, description, prix, image, id_categorie, active) 
    values (18,'Mousse aux chocolat','Onctueuse mousse aux chocolats',5.00,'mousse.jpg',15,'No')");
    // insert into plat (id, libelle, description, prix, image, id_categorie, active) 
    // values (18,'Mousse aux chocolat','Onctueuse mousse aux chocolats',5.00,'mousse.jpg',15,'No')
    $result = $query->execute();
    return $result;
}

// 4.Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza'
function addAugmentation($db)
{
    $query = $db->prepare('UPDATE plat SET prix = prix * 1.1 WHERE libelle LIKE "Pizza%" ');
    $result = $query->execute();
    return $result;
}
