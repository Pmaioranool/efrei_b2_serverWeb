<?php
//dump($data);
$categories = $data
    ?>
<main class="centered">
    <section class="adminPanel">
        <ul>
            <li><a href="/admin/adminUser">ajouter/modifier un admin</a></li>
            <li><a href="/admin/adminCategory">ajouter/modifier une catégorie</a></li>
            <li><a href="/admin/adminProduct">ajouter/modifier un produit</a></li>
        </ul>
    </section>
    <h1>Ajouter un produit</h1>
    <form action="/admin/adminProduit" method="post">
        <label for="nom">nom du produit</label>
        <input type="text" name="nom" id="nom" placeholder="nom du produit" maxlength="50" required>
        <br>
        <label for="description">description du produit</label>
        <textarea name="description" id="description" placeholder="description du produit" required></textarea>
        <br>
        <label for="image">image du produit</label>
        <input type="text" name="image" id="image" placeholder="image du produit" maxlength="250" required>
        <br>
        <label for="prix">prix du produit</label>
        <input type="float" name="prix" id="prix" placeholder="prix du produit" maxlength="50" required>
        <br>
        <label for="categorie">categoriser en tant que</label>
        <select name="categorie" id="categorie" required>
            <option value="">choississer une categorie</option>
            <?php
            foreach ($categories as $category) {
                ?>
                <option value="<?= $category['id_categorie'] ?>"><?= $category['titre'] ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" value="envoyer">
    </form>
</main>