<?php
session_start(); // Démarrer la session

// Exemple de vérification : afficher l'utilisateur connecté
if (isset($_SESSION['userID'])) {
    // Utilisateur connecté
    $id_user = $_SESSION['userID'];
} else {
    // Utilisateur non connecté
    $id_user = null;
}


include_once "view/header.php";

include_once "controller/router.php";

include_once "function.php";

include_once "view/footer.php";