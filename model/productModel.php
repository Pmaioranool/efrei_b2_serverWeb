<?php

include_once "bdd.php";

//TODO: Ajouter un panel admin avec roles
function addProduit($post)
{
    global $mysqlClient;
    $sqlQuery = "INSERT INTO produits(nom, description, image, prix) VALUES (:nom, :description, :image, :prix)";
    $newProduct = $mysqlClient->prepare($sqlQuery);
    $newProduct->execute([
        "nom" => $post["nom"],
        "description" => $post["description"],
        "image" => $post["image"],
        "prix" => $post["prix"]
    ]);
}

function getAllProduit()
{
    global $mysqlClient;
    $sqlQuery = 'SELECT * from produits';
    $product = $mysqlClient->prepare($sqlQuery);
    $product->execute();
    return $product->fetchAll();
}

function getAProduit($id)
{
    global $mysqlClient;
    $sqlQuery = "SELECT * FROM produits WHERE id_produit = $id";
    $product = $mysqlClient->prepare($sqlQuery);
    $product->execute();
    return $product->fetch(PDO::FETCH_ASSOC);

}

function getLastProduits()
{
    global $mysqlClient;
    $sqlQuery = "SELECT * FROM produits ORDER BY id_produit DESC LIMIT 8";
    $products = $mysqlClient->prepare($sqlQuery);
    $products->execute();
    return $products->fetchAll();
}//