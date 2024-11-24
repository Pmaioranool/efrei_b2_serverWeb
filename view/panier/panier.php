<?php

include_once 'controller/panierController.php';
?><?php

// Vérifier si l'id_user est passé dans l'URL
$id_user = intval(value: $_GET['id']); // Récupérer et sécuriser l'ID utilisateur
$panier = getACommandeByUser($id_user); // Appeler la fonction pour récupérer le panier
?>

<main class="contenu-panier">
    <h1>Votre Panier</h1>
    <?php if ($panier): ?>
        <!-- Boucle pour afficher les produits dans le panier -->
        <?php $produits = getProduitInCommande($panier['id_commande']);
        foreach ($produits as $produit): ?>
                <div class="produit"> <h2><?= $produit['nom']; ?></h2>
                <p>Prix :<?= $produit['prix']; ?>€</p>
                <p>Quantité :<?= $produit['quantite']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Votre panier est vide.</p>
    <?php endif; ?>
</main>

<script>
    // Récupérer l'id_user depuis le Local Storage
const userId = localStorage.getItem('userID');
if (userId) { // Créer dynamiquement le lien du panier
const panierLink = document.getElementById('panierLink');
panierLink.href = `index.php?page=panier&id_user=${userId}`;
panierLink.style.display = 'inline'; // Afficher le lien du panier
} else {
console.warn("Utilisateur non connecté : aucun ID trouvé.");
}
</script>

<nav>
    <!-- Lien vers le panier, sera mis à jour dynamiquement -->
    <a id="panierLink" href="#" style="display: none;">Panier</a>
</nav>
