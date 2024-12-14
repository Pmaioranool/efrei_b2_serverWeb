<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class commandeModel
{
    private $id;
    private $userID;

    public function __construct($id = null, $IDuser = null)
    {
        $this->id = $id;
        $this->userID = $IDuser;
    }
    public function addCommande()
    {
        $user = $this->userID;
        //dump($user);
        $date = date('Y-m-d');
        $pdo = Database::getPDO();
        $sqlQuery = "INSERT INTO commandes(date_creation, id_user) VALUES (:date, :userID);";
        $panier = $pdo->prepare($sqlQuery);
        $panier->execute(['date' => $date, 'userID' => $this->userID]);
    }

    public function getAllCommande()
    {
        $pdo = Database::getPDO();
        $sqlQuery = 'SELECT * from commandes';
        $panier = $pdo->prepare($sqlQuery);
        $panier->execute();
        return $panier->fetchAll();

    }
    public function getACommandeByID()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT * FROM commandes WHERE id_commande = $this->id);";
        $panier = $pdo->prepare($sqlQuery);
        $panier->execute();
        return $panier->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCommandeByUser()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT * FROM commandes WHERE id_user = $this->userID;";
        $panier = $pdo->prepare($sqlQuery);
        $panier->execute();
        return $panier->fetchAll();
    }

    public function getACommandeByUser()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT * FROM commandes WHERE id_user = $this->userID ORDER BY date_creation DESC LIMIT 1;";
        $panier = $pdo->prepare($sqlQuery);
        $panier->execute();
        return $panier->fetch(PDO::FETCH_ASSOC);
    }
}