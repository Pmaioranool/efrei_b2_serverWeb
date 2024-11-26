<?php

include_once 'controller/productController.php';
$produit = getAProduit($_GET['id']);

?>

<main>
    <div class="produit-spe">
        <img src="image/<?= $produit['image'] ?>" alt="">
        <div class="desc-prod-spe">
            <h1><?= $produit['nom'] ?></h1>
            <p><?= $produit['description'] ?></p>
            <strong><?= $produit['prix'] ?>€</strong>
            <form action="index.php?page=produit&id=<?= $produit['id_produit'] ?>" method="post" x-data="{ qt: 1 }">
                <button type="button" @click="if (qt > 1) qt--">-</button>
                <span x-text="qt"></span>
                <button type="button" @click="if (qt < 10)qt++">+</button>
                <input type="hidden" name="quantite" :value="qt">
                <input type="hidden" name="id_produit" value="<?= $produit['id_produit'] ?>">
                <input type="submit" value="Ajouter au panier">
            </form>

        </div>
    </div>
</main>
