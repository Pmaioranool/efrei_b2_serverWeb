<?php

include_once "bdd.php";

function addCommande($post)
{
    global $mysqlClient;
    $sqlQuery = "INSERT INTO commandes(date_creation, id_user) value(:date_creation, :id_user)";
    $panier = $mysqlClient->query($sqlQuery);
    $panier->execute([
        "date_creation" => $post['date'],
        "id_user" => $post['id']
    ]);
}

function getAllCommande()
{
    global $mysqlClient;
    $sqlQuery = 'SELECT * from commandes';
    $panier = $mysqlClient->query($sqlQuery);
    $panier->execute();
    return $panier->fetchAll();

}
function getACommandeByID($id)
{
    global $mysqlClient;
    $sqlQuery = "SELECT * FROM commandes WHERE id_commande = $id";
    $panier = $mysqlClient->query($sqlQuery);
    $panier->execute();
    return $panier->fetch(PDO::FETCH_ASSOC);
}

function getAllCommandeByUser($id_user)
{
    global $mysqlClient;
    $sqlQuery = "SELECT * FROM commandes WHERE id_user = $id_user";
    $panier = $mysqlClient->query($sqlQuery);
    $panier->execute();
    return $panier->fetchAll();
}

function getACommandeByUser($id_user)
{
    global $mysqlClient;
    $sqlQuery = "SELECT * FROM commandes WHERE id_user = $id_user ORDER BY date DESC LIMIT 1";
    $panier = $mysqlClient->query($sqlQuery);
    $panier->execute();
    return $panier->fetch(PDO::FETCH_ASSOC);
}