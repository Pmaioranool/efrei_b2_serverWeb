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
-------------------------
<section>
    <form action="index.php?page=user" method="post">
        <input type="email" name="email" id="email" required>
        <br>
        <input type="password" name="MDP" id="MDP" required>
        <br>
        <input type="text" name="nom" id="nom" required>
        <br>
        <input type="text" name="prenom" id="prenom" required>
        <br>
        <input type="submit" name="submit" id="submit" value="S'inscrire">
    </form>
</section><?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $userNew = [
        'email' => $_POST['email'],
        'MDP' => $_POST['MDP'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom']
    ];

    // Vérifier si l'utilisateur existe déjà
    if (!isUser($userNew)) {
        // Enregistrer l'utilisateur
        register($userNew);
        // Récupérer l'ID de l'utilisateur
        $userId = getUserId($userNew['email']);
        echo "<script>localStorage.setItem('userID', '{$userId['id_user']}');</script>";
    } else {
        echo "L'email existe déjà.";
    }
}
?>