<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class userModel
{
    private $email;
    private $MDP;
    private $nom;
    private $prenom;

    public function __construct($email, $MDP, $nom = null, $prenom = null)
    {
        $this->email = $email;
        $this->MDP = $MDP;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }


    public function isUser($email)
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT id_user FROM users WHERE email = :email";
        $getEmail = $pdo->prepare($sqlQuery);
        $getEmail->execute([
            'email' => $email
        ]);
        return $getEmail->fetch() !== false;
    }


    public function getUserId()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT id_user FROM users WHERE email = :email";
        $getID = $pdo->prepare($sqlQuery);
        $getID->execute([
            'email' => $this->email
        ]);
        return $getID->fetch();
    }

    public function getRole()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT titre FROM roles INNER JOIN users ON roles.id_role = users.id_role WHERE id_user = :id_user;";
        $getRole = $pdo->prepare($sqlQuery);
        $userID = $this->getUserId()['id_user'];
        $getRole->execute([
            'id_user' => $userID
        ]);
        return $getRole->fetch(PDO::FETCH_ASSOC);
    }
    public function registerAndLog()
    {
        $pdo = Database::getPDO();
        $sqlQuery = 'INSERT into users(email, MDP, nom, prenom, id_role) value(:email, :MDP, :nom, :prenom, 2)';
        $addUser = $pdo->prepare($sqlQuery);
        $addUser->execute([
            'email' => $this->email,
            'MDP' => $this->MDP,
            'nom' => $this->nom,
            'prenom' => $this->prenom
        ]);
        return $this->getUserId();
    }

    public function login()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT MDP FROM users WHERE email = :email";
        $loginRequest = $pdo->prepare($sqlQuery);
        $loginRequest->execute([
            'email' => $this->email
        ]);
        return $loginRequest->fetch();
    }
}