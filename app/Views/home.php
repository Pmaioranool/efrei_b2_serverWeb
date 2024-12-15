<main>
    <section class="arrivages pad-produit">
        <h1>Nouveaux arrivages</h1>
        <div class="products">
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
    </section>
</main>