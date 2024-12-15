<?php

namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\commande_produitModel;
use App\Models\commandeModel;
use App\Models\productModel;


class PanierController extends CoreController
{
    // Page "panier"
    public function panier()
    {
        $this->isConnected(); // regarde si l'utilisateur est connecté
        $commandeModel = new commandeModel(null, $_SESSION['userID']);
        if (($commandeModel->getAllCommandeByUser()) == []) { // si le panier est n'existe pas ça le créé
            $commandeModel->addCommande();
        }

        $commandeUser = $commandeModel->getACommandeByUser(); // cherche le dernièr panier 0de l'utilisateur
        $CPModel = new commande_produitModel(null, $commandeUser['id_commande']);
        $commandes = $CPModel->getAllInCommande(); // cherche tous les produits et quantité dans le panier
        $produits = [];

        foreach ($commandes as $commande) {
            $produitModel = new ProductModel($commande['id_produit']);
            $produits[] = $produitModel->getAProduit(); // ajoute dans un tableau les datas des produits
        }

        $data = [
            'CP' => $commandes,
            'P' => $produits
        ];

        $this->render('panier/panier', $data);
    }

    // supprimer un produit dans le panier
    public function supprimer()
    {
        $commande_produitManager = new commande_produitModel($_GET['id']);
        $commande_produitManager->suppProduitInCommande();
        $this->panier();
    }

    // ajouter un produit dans le panier
    public function addProductInPanier()
    {
        $this->isConnected();
        if (isset($_POST['id_produit'], $_POST['quantite'])) {

            // Vérifiez si l'utilisateur est connecté
            $id_user = $_SESSION['userID']; // ID utilisateur depuis la session
            $commandeManager = new commandeModel(null, $id_user);
            $panier = $commandeManager->getACommandeByUser();
            $panierID = $panier['id_commande'];
            $id_produit = $_POST['id_produit']; // Sécuriser l'ID produit
            $quantite = $_POST['quantite']; // Sécuriser la quantité

            // Appeler la fonction pour ajouter au panier
            $commande_productManager = new commande_produitModel(null, $panierID, $id_produit, $quantite);
            $commande_productManager->addCommandeProduit();

            // Rediriger
            header("Location: /panier?id=" . $_SESSION['userID']);

        }
    }
}