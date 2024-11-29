<?php

require_once __DIR__ . '/../models/commandeModel.php';
require_once __DIR__ . '/../models/commande_produitModel.php';
require_once __DIR__ . '/../models/productModel.php';
require_once __DIR__ . '/../models/userModel.php';
require_once __DIR__ . '/panierController.php';
require_once __DIR__ . '/productController.php';
require_once __DIR__ . '/restrictionController.php';


class CoreController
{
    // Page d'accueil
    public function home()
    {
        $productManager = new productModel();
        $products = $productManager->getLastProduits();
        $this->render('home', $products);
    }
    // Page "produit"
    public function produit()
    {
        $productManager = new productController();
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $productManager->produit();
        } else {
            $productManager->catalogue();
        }
    }
    // Page "panier"
    public function panier()
    {
        $this->isConnected();
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            return $this->render('panier/panier');
        } else {
            return $this->render('panier/allPanier');
        }
    }
    // Page "admin"
    public function admin()
    {
        $this->isConnected();
        $this->isAdmin();
        $this->render('user/admin');
    }
    // Page "logout"
    public function logout()
    {
        $this->isConnected();
        $this->render('user/logout');
    }
    //page "register"
    public function register()
    {
        $this->render('user/register');
    }
    //Page "login"
    public function login()
    {
        $this->render('user/login');
    }
    // Page 404
    public function notFound()
    {
        http_response_code(404);
        echo "404 - Page Not Found!";
    }

    // Méthode pour inclure une vue
    protected function render($view, $data = [])
    {
        // Transmet les données aux vues
        extract($data);

        // Inclut la vue demandée
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once __DIR__ . '/../views/partials/header.php';
            require_once $viewFile;
            require_once __DIR__ . '/../views/partials/footer.php';
        } else {
            echo "View not found: $view";
        }
    }

    public function isConnected()
    {
        if (!$_SESSION['userID']) {
            header('Location:index.php?accueil');
            exit;
        }
    }

    public function isAdmin()
    {
        if (!$_SESSION['admin'] == true) {
            header('Location:index.php?accueil');
        }
    }
}