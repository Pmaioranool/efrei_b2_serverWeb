<?php

namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\productModel;

class ProductController extends CoreController
{

    // afficher la page produit
    public function produit()
    {
        $productManager = new productModel($_GET['id']);
        $product = $productManager->getAProduit(); // recupères les data du produit
        return $this->render('product/produit', $product);
    }

    // affiche la page catalogue
    public function catalogue()
    {
        $productModel = new productModel();
        $products = $productModel->getAllProduit(); // récupère tous les produits
        return $this->render('product/catalogue', $products);
    }

    // affiche la page catalogue
    public function productByCategory()
    {
        $productModel = new productModel(null, null, null, null, null, $_GET['id']);
        $produits = $productModel->getProductByCategories(); // récupère tous les produits dans la catégorie
        $this->render('product/category', $produits);
    }
}