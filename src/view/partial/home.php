<?php

include_once 'model/productModel.php';
?>

<main>
    <section class="bienvenue">
        <h2>De super offres</h2>
        <h1>Sur tous nos produits</h1>
        <p>Jusqu'a 40% de reduction</p>
        <button>Acheter maintenant</button>
        <!-- TODO: Ajouter du texte -->
    </section>
    <section class="arrivages pad-produit">
        <h1>Nouveaux arrivages</h1>
        <div class="products">
            <?php
            $produits = getLastProduits();
            $i = 1;
            foreach ($produits as $produit) {
                ?>
            <article onclick="window.location.href='index.php?page=produit&id=<?= $produit['id_produit'] ?>'">
                <img src="image/<?= $produit['image'] ?>" alt="">
                <h2><?= $produit['nom'] ?></h2>
                <p><?= $produit['prix'] ?>€</p>
            </article>
            <?php } ?>
        </div>
        <!-- TODO: Inclure les derniers produits de BDD -->
    </section>
    <section class=" actu">
        <!-- TODO: Inclure des bannieres -->
    </section>
    <section class="soldes">
        <h1>les super soldes d'hivers</h1>
        <!-- TODO: Inclure une bannière des soldes -->
    </section>
</main>