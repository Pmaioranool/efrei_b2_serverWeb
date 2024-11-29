<?php
include_once 'controller/panierController.php';

if (isset($_SESSION['userID'])) {
    $userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

    $paniers = getAllCommandeByUser($userID); // Appeler la fonction pour récupérer le panier
}
$somme = 0;
?>

<main class="all-paniers">
    <h1>Vos Paniers</h1>
    <?php if ($paniers) { ?>
        <!-- Boucle pour afficher les produits dans le panier -->
        <?php foreach ($paniers as $panier) {
            $produits = getProduitInCommande($panier['id_commande']); ?><h3>Panier du
                <?= $panier['date_creation'] ?>
            </h3>
            <div
                class="all-paniers-container">
                <?php foreach ($produits as $produit) { ?>
                    <div class="produit">
                        <img src="image/<?= $produit['image'] ?>" alt="">
                        <section>
                            <h2><?= $produit['nom']; ?></h2>
                            <p>Prix :<?= $produit['prix']; ?>€</p>
                            <p>Quantite :
                                <?= $produitInCommande['quantite']; ?>
                            </p>
                        </section>
                    </div>
                    <?php $somme += $produit['prix'] * $produitInCommande['quantite'];
                } ?>
                <p>Prix total :
                    <?= $somme ?>
                </p>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>
            Aucune commande existante.
        </p>
    <?php } ?>
</main>

