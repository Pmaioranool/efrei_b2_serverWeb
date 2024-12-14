<?php

namespace App\Controllers;

use App\Models\productModel;
use App\Controllers\CoreController;


class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        $productManager = new productModel();
        $products = $productManager->getLastProduits();
        $this->render('home', $products);
    }

    public function produit()
    {
        $ProductManager = new ProductController;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $ProductManager->produit();// Redirection vers la page produit spécifique
        } else {
            $ProductManager->catalogue();// Redirection vers la page catalogue
        }
    }

}