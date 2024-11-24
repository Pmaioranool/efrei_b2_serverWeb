<?php
include_once 'controller/panierController.php';

if (isset($_SESSION['userID'])) {
    $userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

    $paniers = getAllCommandeByUser($userID); // Appeler la fonction pour récupérer le panier
}
?>

<main class="contenu-panier">
    <h1>Vos Panier</h1>
    <?php if ($paniers): ?>
        <!-- Boucle pour afficher les produits dans le panier -->
        <?php foreach ($paniers as $panier) {
            $produits = getProduitInCommande($panier['id_commande']);
            foreach ($produits as $produit) { ?>
                    <div class="produit"> <h2><?= $produit['nom']; ?></h2>
                    <p>Prix :<?= $produit['prix']; ?>€</p>
                    <p>Quantité :<?= $produit['quantite']; ?></p>
                </div>
            <?php } ?>
        <?php } ?>

    <?php else: ?><p>
        Aucune commande existante.
    </p>
    <?php endif; ?>
</main>

