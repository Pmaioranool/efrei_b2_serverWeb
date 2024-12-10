<?php

namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\commande_produitModel;

class panierController extends CoreController
{
    public function supprimer()
    {
        if (isset($_GET['supp']) && !empty($_GET['supp'])) {
            $commande_produitManager = new commande_produitModel();
            $commande_produitManager->suppProduitInCommande($_GET['supp']);
            $id_user = $_SESSION['userID'];
            header("location: /panier?id=$id_user");
            exit();
        }
    }
}