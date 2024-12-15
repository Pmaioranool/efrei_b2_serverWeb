<?php
session_start();
// Ici j'inclus le fichier autoload.php car c'est grâce à ce fichier que je vais pouvoir inclure TOUTES mes dépendances composer (donc ce qu'il y a dans le dossier vendor)
require_once __DIR__ . "/../vendor/autoload.php";

use AltoRouter;
use App\Controllers\MainController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Controllers\PanierController;
use App\Controllers\AdminController;

// Je créer une instance de AltoRouter (la librairie que j'ai installé)
$router = new AltoRouter();

// On fournit à AltoRouter la partie de l'URL à ne pa sprendre en compte pour faire la comparaison entre l'URL courante et l'url de la route
// LA valeur de $_SERVER['BASE_URI'] est donnée par le fichier .htaccess. Elle correspond au chemin de la racine du site, ici se termine par public
$router->setBasePath(null); // Je définis le chemin de base => ce par quoi mes routes vont commencer (localhost/.../public)

// Ici, je créer mes routes (https://altorouter.com/usage/mapping-routes.html)

// Ci dessous je dump(j'affiche) CatalogController::class
// CatalogController::class => c'est le nom complet de la classe CatalogController, cad que ca va afficher le namespace de cette classe + le nom de la classe => App\Controllers\CatalogController
$router->addRoutes(array(
    // affiche la page d'accueil
    array(
        'GET',
        '/',
        [
            'controller' => MainController::class, // Dans quel controller ?
            'action' => 'home' // Quelle méthode dans ce controller ?
        ],
        'home'
    ),
    // regarde dans l'URL si il y a l'id du produit et ensuite decide si il va sur le page du produit ou sur le catalogue
    array(
        'GET',
        '/produit',
        [
            'controller' => MainController::class, // Dans quel controller ?
            'action' => 'produit' // Quelle méthode dans ce controller ?
        ],
        'produit'
    ),
    // affiche la page categorie
    array(
        'GET',
        '/categorie',
        [
            'controller' => ProductController::class, // Dans quel controller ?
            'action' => 'productByCategory' // Quelle méthode dans ce controller ?
        ],
        'productByCategory'
    ),
    // affiche la page register
    array(
        'GET',
        '/register',
        [
            'controller' => UserController::class, // Dans quel controller ?
            'action' => 'register' // Quelle méthode dans ce controller ?
        ],
        'register'
    ),
    // ajoute depuis le POST un nouveau user
    array(
        'POST',
        '/register',
        [
            'controller' => UserController::class, // Dans quel controller ?
            'action' => 'registerUser' // Quelle méthode dans ce controller ?
        ],
        'registerUser'
    ),
    // affiche la page login
    array(
        'GET',
        '/login',
        [
            'controller' => UserController::class, // Dans quel controller ?
            'action' => 'login' // Quelle méthode dans ce controller ?
        ],
        'login'
    ),
    // regarde si les information du post correspondent avec la bdd
    array(
        'POST',
        '/login',
        [
            'controller' => UserController::class, // Dans quel controller ?
            'action' => 'loginUser' // Quelle méthode dans ce controller ?
        ],
        'loginUser'
    ),
    // supprime si il y a une valeur dans $_SESSION['userID'] et affiche la page accueil
    array(
        'GET',
        '/logout',
        [
            'controller' => UserController::class, // Dans quel controller ?
            'action' => 'logout' // Quelle méthode dans ce controller ?
        ],
        'logout'
    ),
    // ajoute un nouveau produit dans le panier
    array(
        'POST',
        '/produit',
        [
            'controller' => PanierController::class, // Dans quel controller ?
            'action' => 'addProductInPanier' // Quelle méthode dans ce controller ?
        ],
        'addProductInPanier'
    ),
    // affiche la page panier
    array(
        'GET',
        '/panier',
        [
            'controller' => PanierController::class, // Dans quel controller ?
            'action' => 'panier' // Quelle méthode dans ce controller ?
        ],
        'panier'
    ),
    // supprimer un article du panier
    array(
        'GET',
        '/panierSupp',
        [
            'controller' => PanierController::class, // Dans quel controller ?
            'action' => 'supprimer' // Quelle méthode dans ce controller ?
        ],
        'supprimer'
    ),
    // affiche la page admin
    array(
        'GET',
        '/admin',
        [
            'controller' => AdminController::class, // Dans quel controller ?
            'action' => 'admin' // Quelle méthode dans ce controller ?
        ],
        'admin'
    ),
    // affiche le form pour ajouter un admin
    array(
        'GET',
        '/admin/adminUser',
        [
            'controller' => AdminController::class, // Dans quel controller ?
            'action' => 'adminUser' // Quelle méthode dans ce controller ?
        ],
        'adminUser'
    ),
    // ajouter un admin avec l'email
    array(
        'POST',
        '/admin/adminUser',
        [
            'controller' => AdminController::class, // Dans quel controller ?
            'action' => 'addAdminUser' // Quelle méthode dans ce controller ?
        ],
        'addAdminUser'
    ),
    // affiche le form pour ajouter une categorie
    array(
        'GET',
        '/admin/adminCategory',
        [
            'controller' => AdminController::class, // Dans quel controller ?
            'action' => 'adminCategory' // Quelle méthode dans ce controller ?
        ],
        'adminCategory'
    ),
    // ajouter une categorie
    array(
        'POST',
        '/admin/adminCategory',
        [
            'controller' => AdminController::class, // Dans quel controller ?
            'action' => 'addAdminCategory' // Quelle méthode dans ce controller ?
        ],
        'addAdminCategory'
    ),
    // affiche le form pour ajouter un produit
    array(
        'GET',
        '/admin/adminProduct',
        [
            'controller' => AdminController::class, // Dans quel controller ?
            'action' => 'adminProduct' // Quelle méthode dans ce controller ?
        ],
        'adminProduct'
    ),
    // ajouter un produit
    array(
        'POST',
        '/admin/adminProduit',
        [
            'controller' => AdminController::class, // Dans quel controller ?
            'action' => 'addAdminProduct' // Quelle méthode dans ce controller ?
        ],
        'addAdminProduct'
    )

));
// Ici on check si la route sur laquelle on est a bien été mappé
// doc : https://altorouter.com/usage/matching-requests.html
// La valeur de retour de $router->match() sera egal a false si la route vers laquelle on fait une requete http n'existe pas (n'a pas été routé)
// Elle sera egale a un tableau associatif avec 3 clé target, params et name si la route existe
$match = $router->match();
// dump($match);

// Pour vérifier si la route existe bien
if ($match != false) { // Ici je verifie si $match n'est pas = false
    // On rentre dans le if que si la route existe bel et bien
    // Ci dessous je stock dans $controllerToUse le nom du controller dont j'ai besoin pour la route demandée
    $controllerToUse = $match['target']['controller']; // Le nom du controller
    $methodToUse = $match['target']['action']; // Le nom de la méthode
    // Maintenant qu'on a récupéré le nom de la methode ainsi que le nom du controller, on va devoir executer la méthode qui est dans le controller
    // Pour se faire, on va devoir créer une instance du controller
    $controller = new $controllerToUse(); // $controller est une instance de la classe souhaité (par exemple MainController)
    // Maintenant on va executer la methode $methodToUse
    // J'execute la methode $methodToUse() en lui passant le parametre $match['params'].
    // $match['params'] => array assoc qui contient toutes les données que je veux passer.
    $controller->$methodToUse($match['params']);
}