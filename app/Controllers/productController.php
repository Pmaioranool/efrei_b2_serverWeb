<?php

namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\commande_produitModel;
use App\Models\commandeModel;
use App\Models\productModel;

class productController extends CoreController
{

    public function produit()
    {
        $productManager = new productModel();
        $product = $productManager->getAProduit(id: $_GET['id']);
        return $this->render('product/produit', $product);

    }
    public function catalogue()
    {
        $productManager = new productModel();
        $products = $productManager->getAllProduit();
        return $this->render('product/catalogue', $products);
    }
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_produit'], $_POST['quantite'])) {

            // Vérifiez si l'utilisateur est connecté
            if (isset($_SESSION['userID'])) {
                $commande_productManager = new commande_produitModel();
                $commandeManager = new commandeModel();
                $id_user = $_SESSION['userID']; // ID utilisateur depuis la session
                $panier = $commandeManager->getACommandeByUser($id_user);
                $panierID = $panier['id_commande'];
                $id_produit = intval($_POST['id_produit']); // Sécuriser l'ID produit
                $quantite = intval($_POST['quantite']); // Sécuriser la quantité

                // Appeler la fonction pour ajouter au panier
                $commande_productManager->addCommandeProduit($panierID, $id_produit, $quantite);

                // Rediriger avec un message de succès
                header("Location: index.php?page=panier&id=$panierID");
                exit;
            } else {
                // Rediriger vers la connexion si l'utilisateur n'est pas connecté
                header('Location: index.php?page=user&use=login');
                exit;
            }
        }
    }
}