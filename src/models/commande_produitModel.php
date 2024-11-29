<?php

include_once "bdd.php";
class commande_produitModel
{
    function addCommandeProduit($id_commande, $id_produit, $quantite)
    {
        global $mysqlClient;
        $sqlQuery = "INSERT into commande_produit(quantite, id_commande, id_produit) value(:quantite, :id_commande, :id_produit)";
        $addCP = $mysqlClient->prepare($sqlQuery);
        $addCP->execute([
            "quantite" => $quantite,
            "id_commande" => $id_commande,
            "id_produit" => $id_produit
        ]);
    }

    function getProduitInCommande($IDcommande)
    {
        global $mysqlClient;
        $sqlQuery = "SELECT * FROM commande_produit WHERE id_commande = $IDcommande";
        $prodInCom = $mysqlClient->prepare($sqlQuery);
        $prodInCom->execute();
        return $prodInCom->fetchAll();
    }

    function suppProduitInCommande($id_cp)
    {
        global $mysqlClient;
        $sqlQuery = "DELETE FROM commande_produit WHERE id_cp = $id_cp;";
        $supp = $mysqlClient->prepare($sqlQuery);
        $supp->execute();
    }
}