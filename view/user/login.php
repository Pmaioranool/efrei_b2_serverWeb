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
-------------------------
<form action="index.php?page=user" method="post">
    <input type="email" name="email" id="email" required>
    <br>
    <input type="password" name="MDP" id="MDP" required>
    <br>
    <input type="submit" name="submit" id="submit" value="Se connecter">
</form><?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $MDP = $_POST['MDP'];

    // Vérifier les informations de connexion
    if (login($email, $MDP)) {
        // Récupérer l'ID de l'utilisateur
        $userId = getUserId($email);
        echo "<script>localStorage.setItem('userID', '{$userId['id_user']}');</script>";
    } else {
        echo "Identifiants incorrects.";
    }
}
?>
