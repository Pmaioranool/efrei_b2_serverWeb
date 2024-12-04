<?php
require_once __DIR__ . '/CoreModel.php';


class commandeModel
{
    function addCommande($userID)
    {
        $date = date('Y-m-d');
        global $mysqlClient;
        $sqlQuery = "INSERT INTO commandes(date_creation, id_user) VALUES (:date_creation, :id_user)"; // Change 'value' to 'VALUES'
        $panier = $mysqlClient->prepare($sqlQuery); // Use prepare instead of query for parameterized queries
        $panier->execute([
            "date_creation" => $date,
            "id_user" => $userID
        ]);
    }

    function getAllCommande()
    {
        global $mysqlClient;
        $sqlQuery = 'SELECT * from commandes';
        $panier = $mysqlClient->prepare($sqlQuery);
        $panier->execute();
        return $panier->fetchAll();

    }
    function getACommandeByID($id)
    {
        global $mysqlClient;
        $sqlQuery = "SELECT * FROM commandes WHERE id_commande = $id";
        $panier = $mysqlClient->prepare($sqlQuery);
        $panier->execute();
        return $panier->fetch(PDO::FETCH_ASSOC);
    }

    function getAllCommandeByUser($id_user)
    {
        global $mysqlClient;
        $sqlQuery = "SELECT * FROM commandes WHERE id_user = $id_user";
        $panier = $mysqlClient->prepare($sqlQuery);
        $panier->execute();
        return $panier->fetchAll();
    }

    function getACommandeByUser($id_user)
    {
        global $mysqlClient;
        $sqlQuery = "SELECT * FROM commandes WHERE id_user = $id_user ORDER BY date_creation DESC LIMIT 1";
        $panier = $mysqlClient->prepare($sqlQuery);
        $panier->execute();
        return $panier->fetch(PDO::FETCH_ASSOC);
    }
}