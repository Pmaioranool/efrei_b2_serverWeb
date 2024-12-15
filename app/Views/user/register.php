<main class="centered">
    <h1>Créer mon compte</h1>
    <form action="/register" method="post">
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
</main>