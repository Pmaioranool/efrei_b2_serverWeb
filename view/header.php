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
            <ul id="navbar">
                <li>
                    <a href="index.php?page=accueil"
                        <?php echo ($_GET['page'] == 'accueil') ? 'class="active"' : ''; ?>>Home</a>
                </li>
                <li>
                    <a href="index.php?page=produit"
                        <?php echo ($_GET['page'] == 'produit') ? 'class="active"' : ''; ?>>Shop</a>
                </li>
                <?php
                    if (isset($_POST['id_user']) && !empty($_POST['id_user'])){
                        $panier = getACommandeByUser($_POST['id_user']);
                        ?>
                <li>
                    <a href="index.php?page=panier&id=<?=$panier?>"
                        <?php echo ($_GET['page'] == 'panier') ? 'class="active"' : ''; ?>><i
                            class="fa-solid fa-basket-shopping"></i></a>
                </li>
                <?php
                    }
                    ?>
                <li>
                    <a href="index.php?page=user&role=admin"
                        <?php echo ($_GET['page'] == 'user') ? 'class="active"' : ''; ?>>Admin</a>
                </li>
            </ul>
        </nav>
    </header>