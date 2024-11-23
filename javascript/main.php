<script>
const userId = localStorage.getItem("userID");
const headerMenu = document.getElementById("headerMenu");

if (userId) { // Utilisateur connecté
    headerMenu.innerHTML = `
        <li>
        <a href="index.php?page=accueil"
        <?php echo ($_GET['page'] == 'accueil') ? 'class="active"' : ''; ?>>Home</a>
        </li>
        <li>
        <a href="index.php?page=produit&use=produit"
        <?php echo ($_GET['page'] == 'produit') ? 'class="active"' : ''; ?>>Shop</a>
        </li>
        <?php
        ?>
                <li>
                
                <a href="index.php?page=user&use=register"
                <?php if (isset($_GET['use']) && !empty($_GET['use'])) {
                    echo ($_GET['use'] == 'register') ? 'class="active"' : '';
                } ?>>register</a>
                </li>
                <li>
                
                <a href="index.php?page=user&use=login"
                <?php if (isset($_GET['use']) && !empty($_GET['use'])) {
                    echo ($_GET['use'] == 'login') ? 'class="active"' : '';
                } ?>>login</a>
                </li>
                <?php
                // regarde si il y a id_user en post pour afficher le panier
                if ($localStorage) {
                    $panier = getACommandeByUser($_POST['id_user']);
                    ?>
                    <li>
                    <a href="index.php?page=panier&id=<?= $panier ?>"
                    <?php echo ($_GET['page'] == 'panier') ? 'class="active"' : ''; ?>><i
                    class="fa-solid fa-basket-shopping"></i></a>
                    </li>
                    <?php
                }
                //TODO: faire un if pour vérifier si l'utilisateur est admin
                ?>
                <li>
                <a href="index.php?page=admin"
                <?php echo ($_GET['page'] == 'admin') ? 'class="active"' : ''; ?>>Admin</a>
                </li>
                `;

    // Gérer la déconnexion
    document.getElementById("logout").addEventListener("click", () => {
        localStorage.removeItem("userID");
        alert("Vous êtes déconnecté.");
        window.location.href = "login.php"; // Redirection vers la page de connexion
    });
} else { // Utilisateur non connecté
    headerMenu.innerHTML = `
        <li>
        <a href="index.php?page=accueil"
        <?php echo ($_GET['page'] == 'accueil') ? 'class="active"' : ''; ?>>Home</a>
        </li>
        <li>
        <a href="index.php?page=produit&use=produit"
        <?php echo ($_GET['page'] == 'produit') ? 'class="active"' : ''; ?>>Shop</a>
        </li>
        <?php
        ?>
                <li>
                
                <a href="index.php?page=user&use=register"
                <?php if (isset($_GET['use']) && !empty($_GET['use'])) {
                    echo ($_GET['use'] == 'register') ? 'class="active"' : '';
                } ?>>register</a>
                </li>
                <li>
                
                <a href="index.php?page=user&use=login"
                <?php if (isset($_GET['use']) && !empty($_GET['use'])) {
                    echo ($_GET['use'] == 'login') ? 'class="active"' : '';
                } ?>>login</a>
                </li>
                <?php
                // regarde si il y a id_user en post pour afficher le panier
                if ($localStorage) {
                    $panier = getACommandeByUser($_POST['id_user']);
                    ?>
                    <li>
                    <a href="index.php?page=panier&id=<?= $panier ?>"
                    <?php echo ($_GET['page'] == 'panier') ? 'class="active"' : ''; ?>><i
                    class="fa-solid fa-basket-shopping"></i></a>
                    </li>
                    <?php
                }
                //TODO: faire un if pour vérifier si l'utilisateur est admin
                ?>
                <li>
                <a href="index.php?page=admin"
                <?php echo ($_GET['page'] == 'admin') ? 'class="active"' : ''; ?>>Admin</a>
                </li>
                `;
}
</script>// Vérifier la présence de userID dans le Local Storage