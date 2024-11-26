<?php
include_once 'controller/restrictionController.php';
isConnected();
include_once 'model/commandeModel.php';
include_once 'model/commande_produitModel.php';
include_once 'model/productModel.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    include_once 'view/panier/panier.php';
} else {
    include_once 'view/panier/allPanier.php';
}

if (isset($_GET['supp']) && !empty($_GET['supp'])) {
    suppProduitInCommande($_GET['supp']);
    $id_user = $_SESSION['userID'];
    header("location: index.php?page=panier&id=$id_user");
    exit();
}