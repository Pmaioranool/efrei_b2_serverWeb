<?php

require_once __DIR__ . '/../controllers/CoreController.php';
require_once __DIR__ . '/../controllers/MainController.php';


$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

// Routes
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/produit', 'MainController#produit', 'produit');
$router->map('GET', '/panier', 'MainController#panier', 'panier');
$router->map('GET', '/admin', 'MainController#admin', 'admin');
$router->map('GET', '/logout', 'MainController#logout', 'logout');
$router->map('GET', '/register', 'MainController#register', 'register');
$router->map('GET', '/login', 'MainController#login', 'login');
$router->map('GET', '/commandes', 'MainController#commandes', 'commandes');


// Retourne l'objet router
return $router;