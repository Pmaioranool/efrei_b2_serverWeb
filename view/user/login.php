<?php

include_once "controller/userController.php"
    /*
    <form action="index.php?page=user" method="post">
        <input type="email" name="email" id="email" value="<?= $_POST['email'] ?>">
<br>
<input type="text" name="MDP" id="MDP">
<br>
<input type="submit" name="submit" id="submit">

</form>
*/
    ?>

<main class="centered">
    <h1>Me connecter</h1>
    <form action="index.php?page=user&use=login" method="post">
        <label for="email">Votre email :
        </label>
        <input type="email" name="email" id="email" placeholder="exemple@exemple.com" maxlength="100" required>
        <br>
        <label for="MDP">Mot de passe :
        </label>
        <input type="password" name="MDP" id="MDP" placeholder="Mot de passe" maxlength="100" required>
        <br>
        <input type="submit" name="submit" id="submit" value="Se connecter">
    </form>
</main><?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $MDP = $_POST['MDP'];

    // Vérifier les informations de connexion
    if (login($email, $MDP)) {
        // Récupérer l'ID de l'utilisateur
        $userId = getUserId($email);
        $_SESSION['userID'] = $userId['id_user'];
        header('Location: index.php?page=accueil');
        echo '<div class="success">Connexion réussie.</div>';
    } else {
        echo '<div class="incorrect">Identifiants incorrects.</div>';
    }
}
?>
