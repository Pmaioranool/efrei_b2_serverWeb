<?php

include_once "model/productModel.php";
include_once "model/commande_produitModel.php";
include_once "model/commandeModel.php";

if (!isset($_GET['id']) && empty($_GET['id'])) {
    include_once 'view/product/catalogue.php';
} else {
    include_once 'view/product/produit.php';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_produit'], $_POST['quantite'])) {

    // Vérifiez si l'utilisateur est connecté
    if (isset($_SESSION['userID'])) {
        $id_user = $_SESSION['userID']; // ID utilisateur depuis la session
        $panier = getACommandeByUser($id_user);
        $panierID = $panier['id_commande'];
        $id_produit = intval($_POST['id_produit']); // Sécuriser l'ID produit
        $quantite = intval($_POST['quantite']); // Sécuriser la quantité

        // Appeler la fonction pour ajouter au panier
        addCommandeProduit($panierID, $id_produit, $quantite);

        // Rediriger avec un message de succès
        header("Location: index.php?page=panier&id=$panierID");
        exit;
    } else {
        // Rediriger vers la connexion si l'utilisateur n'est pas connecté
        header('Location: index.php?page=user&use=login');
        exit;
    }
}