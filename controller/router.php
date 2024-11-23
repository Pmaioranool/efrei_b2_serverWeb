<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

switch ($page) {
    case 'panier':
        break;
    case 'produit':
        include_once "controller/productController.php";
        break;
    case 'user':
        $role = isset($_GET['role']) ? $_GET['role'] : 'membre';
        switch ($role) {
            case 'admin':
                include_once "controller/adminController.php";
                break;
            default:
                include_once 'controller/userController.php';
                break;
        }
        break;
    default:
        include_once 'view/accueil.php';
        break;
}