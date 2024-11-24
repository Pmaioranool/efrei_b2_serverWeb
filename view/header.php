<?php
include_once 'model/commandeModel.php'
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
                <li>
                    <a href="index.php?page=accueil"
                        <?php echo ($_GET['page'] == 'accueil') ? 'class="active"' : ''; ?>>Home</a>
                </li>
                <li>
                    <a href="index.php?page=produit&use=produit"
                        <?php echo ($_GET['page'] == 'produit') ? 'class="active"' : ''; ?>>Shop</a>
                </li>
                <?php if(isset($_SESSION['userID']) && !empty($_SESSION['userID'])){ 
                    $panier = getACommandeByUser($_SESSION['userID'])?>
                <li>
                    <a href="index.php?page=panier&id=<?=$panier['id_commande']?>" id='panierLink'
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
                <?php }
                else{ ?>
                <li>
                    <a href="index.php?page=user&use=register" <?php if (isset($_GET['use']) && !empty($_GET['use'])) {
                            echo ($_GET['use'] == 'register') ? 'class="active"' : '';
                        } ?>>register</a>
                </li>
                <li>
                    <a href="index.php?page=user&use=login" <?php if (isset($_GET['use']) && !empty($_GET['use'])) {
                        echo ($_GET['use'] == 'login') ? 'class="active"' : '';
                    } ?>>login</a>
                </li>
                <?php } ?>

            </ul>
        </nav>
    </header>