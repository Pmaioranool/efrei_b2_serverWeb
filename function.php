<?php
include_once 'model/commandeModel.php';

// Vérifie si la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['userID'])) {
$userID = intval($data['userID']); // Sécurise et cast en entier
$_SESSION['id_user'] = $userID;
$panier = getACommandeByUser($userID);

echo json_encode([
"status" => "success",
"userID" => $userID,
"panier" => $panier,
]);
} else {
echo json_encode([
"status" => "error",
"message" => "userID manquant.",
]);
}
exit;
}
?>
<script>
let panier = null;
const userID = localStorage.getItem("userID");
const headerMenu = document.getElementById("headerMenu");

if (userID) {
    async function fetchData() {
        try {
            const response = await fetch("function.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    userID,
                }),
            });

            const result = await response.text();
            try {
                let resultArray = JSON.parse(result); // Essaye de convertir en tableau ou objet
                let panierArray = resultArray['panier']; // Accède à la clé 'panier' dans l'objet JSON
                panier = panierArray['id_commande'];
            } catch (error) {
                console.error("Erreur de conversion JSON:", error);
            }
        } catch (error) {
            console.error("Erreur :", error);
        }
    }
    // Une fois le panier récupéré, on met à jour le menu
    headerMenu.innerHTML = `
                <li>
                    <a href="index.php?page=accueil" 
                    <?php echo ($_GET['page'] == 'accueil') ? 'class="active"' : ''; ?>>Home</a>
                </li>
                <li>
                    <a href="index.php?page=produit&use=produit" 
                    <?php echo ($_GET['page'] == 'produit') ? 'class="active"' : ''; ?>>Shop</a>
                </li>
                <li>
                    <a href='index.php?page=panier&id=${userID}' id='panierLink'
                    <?php echo ($_GET['page'] == 'panier') ? 'class="active"' : ''; ?>>
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=admin" 
                    <?php echo ($_GET['page'] == 'admin') ? 'class="active"' : ''; ?>>Admin</a>
                </li>
                <li>
                    <a href="index.php?page=user&use=logout" id="logout">Déconnexion</a>
                </li>
            `;

    fetchData(); // Appelle la fonction asynchrone
    // Gérer la déconnexion
    document.getElementById("logout").addEventListener("click", () => {
        localStorage.removeItem("userID");
        alert("Vous êtes déconnecté.");
        window.location.href = "view/user/login.php";
    });
} else {
    // Utilisateur non connecté
    headerMenu.innerHTML = `
        <li>
            <a href="index.php?page=accueil"
            <?php echo ($_GET['page'] == 'accueil') ? 'class="active"' : ''; ?>>Home</a>
        </li>
        <li>
            <a href="index.php?page=produit&use=produit"
            <?php echo ($_GET['page'] == 'produit') ? 'class="active"' : ''; ?>>Shop</a>
        </li>
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
    `;
}
</script>