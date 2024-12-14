<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class productModel
{
    private $id;
    private $nom;
    private $description;
    private $image;
    private $prix;

    public function __construct($id = null, $nom = null, $description = null, $image = null, $prix = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
        $this->prix = $prix;
    }
    //TODO: Ajouter un panel admin avec roles

    public function addProduit()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "INSERT INTO produits(nom, description, image, prix) VALUES (:nom, :description, :image, :prix)";
        $newProduct = $pdo->prepare($sqlQuery);
        $newProduct->execute([
            "nom" => $this->nom,
            "description" => $this->description,
            "image" => $this->image,
            "prix" => $this->prix
        ]);
    }

    public function getAllProduit()
    {
        $pdo = Database::getPDO();
        $sqlQuery = 'SELECT * from produits';
        $product = $pdo->prepare($sqlQuery);
        $product->execute();
        return $product->fetchAll();
    }

    public function getAProduit()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT * FROM produits WHERE id_produit = :id";
        $product = $pdo->prepare($sqlQuery);
        $product->execute(['id' => $this->id]);
        return $product->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastProduits()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT * FROM produits ORDER BY id_produit DESC LIMIT 8";
        $products = $pdo->prepare($sqlQuery);
        $products->execute();
        return $products->fetchAll();
    }
}