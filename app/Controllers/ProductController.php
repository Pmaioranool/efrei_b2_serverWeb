<?php

namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\commande_produitModel;
use App\Models\commandeModel;
use App\Models\productModel;

class ProductController extends CoreController
{

    public function produit()
    {
        $productManager = new productModel($_GET['id']);
        $product = $productManager->getAProduit();
        return $this->render('product/produit', $product);
    }
    public function catalogue()
    {
        $productModel = new productModel();
        $products = $productModel->getAllProduit();
        return $this->render('product/catalogue', $products);
    }

    public function productByCategory()
    {
        $productModel = new productModel(null, null, null, null, null, $_GET['id']);
        $produits = $productModel->getProductByCategories();
        $this->render('product/category', $produits);
    }
}