<?php
include_once 'model/commandeModel.php';
include_once 'model/commande_produitModel.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    include_once 'view/panier/panier.php';
} else {
    include_once 'view/panier/allPanier.php';
}