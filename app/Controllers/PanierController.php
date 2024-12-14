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
        $this->isConnected();
        $commandeModel = new commandeModel(null, $_SESSION['userID']);
        if (($commandeModel->getAllCommandeByUser()) == []) {
            $commandeModel->addCommande();
        }
        $commandeUser = $commandeModel->getACommandeByUser();
        $CPModel = new commande_produitModel(null, $commandeUser['id_commande']);
        $commandes = $CPModel->getAllInCommande();
        $produits = [];
        foreach ($commandes as $commande) {
            $produitModel = new ProductModel($commande['id_produit']);
            $produits[] = $produitModel->getAProduit();
        }
        $data = [
            'CP' => $commandes,
            'P' => $produits
        ];
        $this->render('panier/panier', $data);
    }

    //Page "commandes"
    public function commandes()
    {
        $commandeManager = new CommandeModel();
        dump($commandeManager->getAllCommandeByUser());
        if (!($commandeManager->getAllCommandeByUser())) {
            $userID = $_SESSION['userID'];
            $CommandeModel = new CommandeModel($userID);
            $CommandeModel->addCommande();
        }
        $this->render('panier/allPanier');
    }

    public function supprimer()
    {
        $commande_produitManager = new commande_produitModel($_GET['id']);
        $commande_produitManager->suppProduitInCommande();
        $this->panier();
    }
    public function addProductInPanier()
    {
        $this->isConnected();
        if (isset($_POST['id_produit'], $_POST['quantite'])) {

            // Vérifiez si l'utilisateur est connecté
            $id_user = $_SESSION['userID']; // ID utilisateur depuis la session
            $commandeManager = new commandeModel(null, $id_user);
            $panier = $commandeManager->getACommandeByUser();
            $panierID = $panier['id_commande'];
            $id_produit = intval($_POST['id_produit']); // Sécuriser l'ID produit
            $quantite = intval($_POST['quantite']); // Sécuriser la quantité

            // Appeler la fonction pour ajouter au panier
            $commande_productManager = new commande_produitModel(null, $panierID, $id_produit, $quantite);
            $commande_productManager->addCommandeProduit();

            // Rediriger
            header("Location: /panier?id=" . $_SESSION['userID']);

        }
    }
}