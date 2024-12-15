<main class="centered">
    <section class="adminPanel">
        <ul>
            <li><a href="/admin/adminUser">ajouter/modifier un admin</a></li>
            <li><a href="/admin/adminCategory">ajouter/modifier une catégorie</a></li>
            <li><a href="/admin/adminProduct">ajouter/modifier un produit</a></li>
        </ul>
    </section>
    <h1>Ajouter un produit</h1>
    <form action="/admin/adminCategory" method="post">
        <label for="nom">nom du produit</label>
        <input type="text" name="titre" id="tire" placeholder="titre de la categorie" maxlength="50" required>
        <br>
        <input type="submit" value="envoyer">
    </form>
</main>