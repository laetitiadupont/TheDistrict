<?php
require_once("db_connect.php");

// categorie afficher sur l'index
function getCatIndex($db) {
    $query = $db->query("SELECT * FROM categorie LIMIT 6");
    $query-> execute();
    $categorie = $query->fetchAll(PDO::FETCH_OBJ);
    return $categorie;
}
// Catégorie 
function getCateg($db) {
    $categ = $db->query("SELECT * FROM categorie");
    $result = $categ->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
// plats par categorie (Page Categorie)
function getPlatsByCat($cat,$db) {
    $query = $db-> prepare("SELECT * FROM plat WHERE id_categorie=:cat_id");
    $query-> bindParam(':cat_id',$cat,PDO::PARAM_INT);
    $query-> execute();
    $platsByCat=$query-> fetchAll(PDO::FETCH_OBJ);
    return $platsByCat;
}
// affiche tous les plats (page plats)
function getPlats($db) {
    $query = $db-> prepare('SELECT * FROM plat');
    $query-> execute();
    $plats = $query-> fetchAll(PDO::FETCH_OBJ);
    return $plats;
}

?>