<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class categoriesModel
{
    private $titre;

    public function __construct($titre = null, $parent = null)
    {
        $this->titre = $titre;
    }

    public function addCategory()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "INSERT INTO categories (titre) VALUES (:titre)";
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute(
            [
                'titre' => $this->titre,
            ]
        );
    }

    public function getAllCategories()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT * FROM categories";
        $categories = $pdo->prepare($sqlQuery);
        $categories->execute();
        return $categories->fetchAll(PDO::FETCH_ASSOC);
    }
}