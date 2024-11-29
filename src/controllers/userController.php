<?php

include_once 'model/userModel.php';
include_once 'model/commandeModel.php';

$use = isset($_GET['use']) ? $_GET['use'] : 'accueil';


switch ($use) {
    case 'register':
        include_once 'view/user/register.php';
        break;
    case 'login':
        include_once 'view/user/login.php';
        break;
    case 'logout':
        include_once 'view/user/logout.php';

        break;
}