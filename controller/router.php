<?php
$page = $_GET['page'];

// Inclure le bon contrôleur en fonction de la page demandée
switch ($page) {
    case 'panier':
        include_once "controller/panierController.php";
        break;
    case 'produit':
        include_once "controller/productController.php";
        break;
    case 'admin':
        include_once "controller/adminController.php";
        break;
    case 'user':
        include_once 'controller/userController.php';
        break;
    default:
        include_once 'view/accueil.php'; // Page par défaut
        break;
}
?>
