<?php

include_once "bdd.php";

function addCommandeProduit($post)
{
    global $bdd;
    $sqlQuery = "INSERT into commande_produit(quantite, id_commande, id_produit) value(:quantite, :id_commande, :id_produit)";
    $addCP = $bdd->prepare($sqlQuery);
    $addCP->execute([
        "quantite" => $post["quantite"],
        "id_commande" => $post["id_commande"],
        "id_produit" => $post["id_produit"]
    ]);
}