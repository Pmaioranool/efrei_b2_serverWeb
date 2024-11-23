<?php

include_once "model/productModel.php";

if (!isset($_GET['id']) && empty($_GET['id'])) {
    include_once 'view/product/catalogue.php';
} else {
    include_once 'view/product/produit.php';
}