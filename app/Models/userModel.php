<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class userModel
{
    function isUser($email)
    {
        global $mysqlClient;

        $sqlQuery = "SELECT id_user FROM users WHERE email = :email";
        $getEmail = $mysqlClient->prepare($sqlQuery);
        $getEmail->execute([
            'email' => $email
        ]);
        return $getEmail->fetch() !== false;
    }


    function getUserId($email)
    {
        global $mysqlClient;
        $sqlQuery = "SELECT id_user FROM users WHERE email = :email";
        $getID = $mysqlClient->prepare($sqlQuery);
        $getID->execute([
            'email' => $email
        ]);

        return $getID->fetch();

    }

    function register($userNew)
    {
        global $mysqlClient;
        $sqlQuery = 'INSERT into users(email, MDP, nom, prenom) value(:email, :MDP, :nom, :prenom)';
        $addUser = $mysqlClient->prepare($sqlQuery);
        $addUser->execute([
            'email' => $userNew['email'],
            'MDP' => $userNew['MDP'],
            'nom' => $userNew['nom'],
            'prenom' => $userNew['prenom']
        ]);

        return 'ajout réussis';
    }

    function login($email, $MDP)
    {
        global $mysqlClient;
        $sqlQuery = "SELECT MDP FROM users WHERE email = :email";
        $loginRequest = $mysqlClient->prepare($sqlQuery);
        $loginRequest->execute([
            'email' => $email
        ]);
        if ($loginRequest->fetch()['MDP'] == $MDP) {
            return true;
        } else
            return false;
    }


}