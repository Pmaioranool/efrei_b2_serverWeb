<main>
    <section class="arrivages pad-produit">
        <h1>Nouveaux arrivages</h1>
        <div
            class="products">
            <?php
            foreach ($data as $produit) {
                ?>
                <article onclick="window.location.href='produit?id=<?= $produit['id_produit'] ?>'">
                    <img src="image/<?= $produit['image'] ?>" alt="">
                    <h2><?= $produit['nom'] ?></h2>
                    <p><?= $produit['prix'] ?>€</p>
                </article>
            <?php } ?>
        </div>
        <!-- TODO: Inclure les derniers produits de BDD -->
    </section>
    <section
        class=" actu"><!-- TODO: Inclure des bannieres -->
    </section>
    <section class="soldes">
        <h1>les super soldes d'hivers</h1>
        <!-- TODO: Inclure une bannière des soldes -->
    </section>
</main>
