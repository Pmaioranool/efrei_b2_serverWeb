<?php

include_once 'controller/panierController.php';

$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;
?>

<main class="contenu-panier">
    <h1>Votre Panier</h1>
    <!-- Boucle pour afficher les produits dans le panier -->
    <?php $produitsInCommande = getProduitInCommande($panier['id_commande']);
    if ($produitsInCommande) {
        foreach ($produitsInCommande as $produitInCommande) {
            $produit = getAProduit($produitInCommande['id_produit']) ?>
            <div class="produit">
                <h2><?= $produit['nom']; ?></h2>
                <p>Prix :<?= $produit['prix']; ?>€</p>
                <img src="image/<?= $produit['image'] ?>" alt="">
                <p>Quantité :<?= $produitInCommande['quantite']; ?></p>
            </div>
        <?php }
    } else { ?>
        <p>Votre panier est vide.</p>
    <?php } ?>
</main>

