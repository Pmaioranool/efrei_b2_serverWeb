<?php

namespace App\Controllers;

use App\Models\productModel;
use App\Controllers\CoreController;


class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        echo 'a';
        //$this->render('home');
        //$productManager = new productModel();
        //$products = $productManager->getLastProduits();
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
        $this->render('panier/panier');

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
        $this->getUser();
    }
    //Page "commandes"
    public function commandes()
    {
        $this->render('panier/allPanier');
    }

}