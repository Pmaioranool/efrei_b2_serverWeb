<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class commande_produitModel
{
    private $id;
    private $idCommande;
    private $idProduit;
    private $quantite;

    public function __construct($id = null, $idC = null, $idP = null, $qt = null)
    {
        $this->id = $id;
        $this->idCommande = $idC;
        $this->idProduit = $idP;
        $this->quantite = $qt;
    }
    function addCommandeProduit()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "INSERT into commande_produit(quantite, id_commande, id_produit) value(:quantite, :id_commande, :id_produit)";
        $addCP = $pdo->prepare($sqlQuery);
        $addCP->execute([
            "quantite" => $this->quantite,
            "id_commande" => $this->idCommande,
            "id_produit" => $this->idProduit
        ]);
    }

    function getAllInCommande()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT * FROM commande_produit WHERE id_commande = $this->idCommande";
        $prodInCom = $pdo->prepare($sqlQuery);
        $prodInCom->execute();
        return $prodInCom->fetchAll();
    }

    function suppProduitInCommande()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "DELETE FROM commande_produit WHERE id_cp = $this->id;";
        $supp = $pdo->prepare($sqlQuery);
        $supp->execute();
    }
}