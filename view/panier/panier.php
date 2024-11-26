<?php include_once 'controller/panierController.php';
$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;
?>

<?php
$produitsInCommande = getProduitInCommande($panier['id_commande']);
$somme = 0;
$count = 0;
?>
<main
    class="main-panier">
    <?php if ($produitsInCommande) { ?>
        <div class="panier-container">
            <h1>Votre Panier</h1>
            <div
                class="panier-produit">
                <?php foreach ($produitsInCommande as $produitInCommande) {
                    $produit = getAProduit($produitInCommande['id_produit']);
                    $count += 1; ?>

                    <div class="produit">
                        <img src="image/<?= $produit['image'] ?>" alt="">
                        <section>
                            <h2><?= $produit['nom']; ?></h2>
                            <p>Prix :<?= $produit['prix']; ?>€</p>
                            <p>Quantite :
                                <?= $produitInCommande['quantite']; ?>
                                <a href="index.php?page=panier&id=<?= $_GET['id'] ?>&supp=<?= $produitInCommande['id_cp'] ?>">supprimer</a>
                            </p>
                        </section>
                    </div>
                    <?php
                    $somme += $produit['prix'] * $produitInCommande['quantite'];

                }
                $count > 1 ? $countString = $count . ' articles' : $countString = $count . ' article';
                ?>
            </div>
        </div>

        <div class="somme">
            <p>sous-total (
                <?= $countString ?>
                ):
            </p>
            <span><?= $somme ?>€</span>
        </div>
    <?php } else { ?>
        <div class="product">
            <h1>Votre panier est vide.</h1>
        <?php } ?>
    </main>
