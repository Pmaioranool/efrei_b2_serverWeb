<?php

try {

    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=b2dev2serverweblm;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}