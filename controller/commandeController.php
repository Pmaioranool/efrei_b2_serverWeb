<?php

include_once "model/commandeModel.php";

if (!isset($_GET['id']) && empty($_GET['id'])) {
    include_once 'view/product/panier.php';
} else {
    include_once 'view/product/.php';
}