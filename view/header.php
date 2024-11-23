<?php

include_once 'model/commandeModel.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://kit.fontawesome.com/020fe7311e.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body>
    <header id="header">
        <a href="index.php?page=accueil ">
            <img src="image/image2.jpg" class="logo" alt="" />
        </a>

        <nav>
            <ul id="headerMenu" class="navbar">
                // Vérifier la présence de userID dans le Local Storage
            </ul>
        </nav>
    </header>


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
        <li>
        <?php
        // $userID = 1;
        // $panier = getACommandeByUser($userID);
        ?>
        <a href="index.php?page=panier&id=<?= $panier ?>"
        <?php echo ($_GET['page'] == 'panier') ? 'class="active"' : ''; ?>><i
        class="fa-solid fa-basket-shopping"></i></a> 
        </li>
            // FIXME: Panier ID a fix!
        
        <li>
        <a href="index.php?page=admin"
        <?php echo ($_GET['page'] == 'admin') ? 'class="active"' : ''; ?>>Admin</a>
        </li>
        <li><a href="index.php?page=user&use=logout" id="logout">Déconnexion</a></li>
        `;
        //TODO: faire un if pour vérifier si l'utilisateur est admin

        // Gérer la déconnexion
        document.getElementById("logout").addEventListener("click", () => {
            localStorage.removeItem("userID");
            alert("Vous êtes déconnecté.");
            window.location.href = "view/user/login.php"; // Redirection vers la page de connexion
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
        `;
    }
    </script>