<?php

include_once 'model/productModel.php';
?>


<main class="arrivages pad-produit">
    <h1>Tous nos produits</h1>
    <div
        class="products">
        <?php $produits = getAllProduit();
        foreach ($produits as $produit) {
            ?>
            <article onclick="window.location.href='index.php?page=produit&id=<?= $produit['id_produit'] ?>'">
                <img src="image/<?= $produit['image'] ?>" alt="">
                <h2><?= $produit['nom'] ?></h2>
                <p><?= $produit['prix'] ?>€</p>
            </article>
        <?php } ?>
    </div>
</main>
