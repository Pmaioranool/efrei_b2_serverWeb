<?php
include_once "controller/userController.php"

    /*
    <section>
        <form action="index.php?page=user" method="post">
            <input type="email" name="email" id="email" value="<?= $_POST['email'] ?>">
<br>
<input type="text" name="MDP" id="MDP">
<br>
<input type="text" name="nom" id="nom">
<br>
<input type="text" name="prenom" id="prenom">
<br>
<input type="submit" name="submit" id="submit">
</form>
</section>

<script>
localStorage.setItem('userID',
    <?= $user['id'] ?>
);
</script>

*/


?>
<main class="centered">
    <h1>Créer mon compte</h1>
    <form action="index.php?page=user&use=register" method="post">
        <label for="email">Votre email :
        </label>
        <input type="email" name="email" id="email" placeholder="exemple@exemple.com" maxlength="100" required>
        <br>
        <label for="MDP">Créer un mot de passe :
        </label>
        <input type="password" name="MDP" id="MDP" placeholder="Mot de passe" minlength='8' maxlength="100" required>
        <br>
        <label for="nom">Entrez votre nom :
        </label>
        <input type="text" name="nom" id="nom" placeholder="Nom" maxlength="50" required>
        <br>
        <label for="prenom">Entrez votre prénom :
        </label>
        <input type="text" name="prenom" id="prenom" placeholder="Prénom" maxlength="50" required>
        <br>
        <input type="submit" name="submit" id="submit" value="S'inscrire">
    </form>
</main><?php


if (
    isset($_POST['email']) && !empty($_POST['email']) ||
    isset($_POST['MDP']) && !empty($_POST['MDP']) ||
    isset($_POST['nom']) && !empty($_POST['nom']) ||
    isset($_POST['prenom']) && !empty($_POST['prenom'])
) {
    // Vérifier si l'utilisateur existe déjà
    if (!isUser($_POST)) {
        // Enregistrer l'utilisateur
        register($_POST);
        // Récupérer l'ID de l'utilisateur
        $userId = getUserId($_POST['email']);
        echo "<script>localStorage.setItem('userID', '{$userId['id_user']}');</script>";
    } else {
        echo "L'email existe déjà.";
    }
}
?>