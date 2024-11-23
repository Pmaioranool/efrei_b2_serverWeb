<?php

include_once 'model/productModel.php';
include_once 'view/user/admin.php';

if (isset($_POST) && !empty($_POST)) {
    if (
        (isset($_POST['nom']) && !empty($_POST['nom'])) ||
        (isset($_POST['description']) && !empty($_POST['description'])) ||
        (isset($_POST['image']) && !empty($_POST['image'])) ||
        (isset($_POST['prix']) && !empty($_POST['prix']))
    ) {
        addProduit($_POST);
    } else {
        echo "Veuillez remplir tous les champs";
    }
}