<main class="centered">
    <h1>Ajouter un produit</h1>
    <form action="index.php?page=user&role=admin" method="post">
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
        <input type="submit" value="envoyer">
    </form>
</main>