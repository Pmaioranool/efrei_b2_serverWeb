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
