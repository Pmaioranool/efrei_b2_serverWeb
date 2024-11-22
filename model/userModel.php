<?php

include_once 'bdd.php';

function isUser($email)
{
    global $bdd;
    $sqlQuery = "SELECT id_user FROM users WHERE email = $email";
    $user = $bdd->prepare($sqlQuery);
    $user->execute();

    return $user->fetch(PDO::FETCH_ASSOC);
}

function register($userNew)
{
    $alreadyUser = isUser($userNew['email']) ? true : false;
    if ($alreadyUser == true) {
        return 'déjà utilisateur.';
    }

    global $bdd;
    $sqlQuery = 'INSERT into users(email, MDP, nom, prenom) value(:email, :MDP, :nom, :prenom)';
    $addUser = $bdd->prepare($sqlQuery);
    $addUser->execute([
        'email' => $userNew['email'],
        'MDP' => $userNew['MDP'],
        'nom' => $userNew['nom'],
        'prenom' => $userNew['prenom']
    ]);

    return 'ajout réussis';
}

function login($id, $MDP)
{
    global $bdd;
    $sqlQuery = "SELECT MPD FROM users WHERE id_user = $id";
    $loginRequest = $bdd->prepare($sqlQuery);
    $mdp = $loginRequest->execute();
    return $mdp == $MDP ? true : false;
}