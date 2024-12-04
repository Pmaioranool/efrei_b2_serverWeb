<?php

require_once __DIR__ . '/../controllers/CoreController.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

// Routes
$router->map('GET', '/', 'CoreController#home', 'home');
$router->map('GET', '/produit', 'CoreController#produit', 'produit');
$router->map('GET', '/panier', 'CoreController#panier', 'panier');
$router->map('GET', '/admin', 'CoreController#admin', 'admin');
$router->map('GET', '/logout', 'CoreController#logout', 'logout');
$router->map('GET', '/register', 'CoreController#register', 'register');
$router->map('GET', '/login', 'CoreController#login', 'login');
$router->map('GET', '/commandes', 'CoreController#commandes', 'commandes');


// Retourne l'objet router
return $router;