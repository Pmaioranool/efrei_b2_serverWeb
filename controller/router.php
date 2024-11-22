<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

switch ($page) {
    case 'user':
        include_once 'controller/userController.php';
        break;
    default:
        include_once 'view/accueil.php';
        break;
}