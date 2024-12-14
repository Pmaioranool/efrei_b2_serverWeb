<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/020fe7311e.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body>
    <header id="header">
        <a href="">
            <img src="image/image2.jpg" class="logo" alt="" />
        </a>

        <nav>
            <ul id="headerMenu" class="navbar">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="produit">Shop</a>
                </li>
                <?php if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) { ?>
                    <li>
                        <a href="panier?id=<?= $_SESSION['userID'] ?>" id='panierLink'>
                            <i class="fa-solid fa-basket-shopping"></i>
                        </a>
                    </li>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <li>
                        <a href="logout" id="logout">Déconnexion</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="register">register</a>
                    </li>
                    <li>
                        <a href="login">login</a>
                    </li>
                <?php } ?>

            </ul>
        </nav>
    </header>