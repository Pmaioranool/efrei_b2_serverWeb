<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'accueille';

switch ($page) {
    case 'user':
        include_once 'controller/userController.php';
        break;
    default:
        include_once 'index.php';
        break;
}