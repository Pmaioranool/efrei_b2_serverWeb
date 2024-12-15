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
    private $idC;

    public function __construct($id = null, $nom = null, $description = null, $image = null, $prix = null, $idC = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
        $this->prix = $prix;
        $this->idC = $idC;
    }

    public function addProduct()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "INSERT INTO produits(nom, description, image, prix, id_categorie) VALUES (:nom, :description, :image, :prix, :id_categorie)";
        $newProduct = $pdo->prepare($sqlQuery);
        $newProduct->execute([
            "nom" => $this->nom,
            "description" => $this->description,
            "image" => $this->image,
            "prix" => $this->prix,
            "id_categorie" => $this->idC
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
        $product->execute([
            'id' => $this->id
        ]);
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

    public function getProductByCategories()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT * FROM produits WHERE id_categorie = :idC";
        $product = $pdo->prepare($sqlQuery);
        $product->execute([
            'idC' => $this->idC
        ]);
        return $product->fetchAll();
    }
}