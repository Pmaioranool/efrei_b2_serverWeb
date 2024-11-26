<?php
session_start(); // Démarrer la session

// Vérifiez si $_GET est vide ou si 'page' n'est pas défini
if (empty($_GET) || !isset($_GET['page']) || empty($_GET['page'])) {
    header('Location: index.php?page=accueil');
    exit; // Assurez-vous d'utiliser exit après header
}
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

include_once "view/footer.php";