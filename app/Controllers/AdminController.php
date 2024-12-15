<?php

// ajout au dossier fictif
namespace App\Controllers;

// utilisation des differents models et controllers
use App\Controllers\CoreController;
use App\Models\userModel;
use App\Models\productModel;
use App\Models\categoriesModel;

class AdminController extends CoreController
{

    // Page "admin"
    public function admin()
    {
        $this->isAdmin(); // veriffication si l'utilisateur est un admin
        $this->render('admin/admin');
    }

    // Page "adminUser"
    public function adminUser()
    {
        $this->isAdmin();
        $this->render('admin/adminUser');
    }
    // Page "adminCategory"
    public function adminCategory()
    {
        $this->isAdmin();
        $this->render('admin/adminCategory');
    }

    // Page "adminProduct"
    public function adminProduct()
    {
        $this->isAdmin();
        $categoriesModel = new CategoriesModel();
        $categories = $categoriesModel->getAllCategories(); // recois les categories pour afficher dans le select du form
        $this->render('admin/adminProduct', $categories);
    }

    public function addAdminUser()
    {
        $this->isAdmin();
        $userModel = new UserModel($_POST['email']);
        $userModel->addAdmin(); // modification de la bdd pour ajouter au role admin
        $this->adminUser();
    }

    public function addAdminCategory()
    {
        $this->isAdmin();
        $categoriesModel = new CategoriesModel($_POST['titre']);
        $categoriesModel->addCategory(); // modification de la bdd pour ajouter une categorie
        $this->adminCategory();
    }

    public function addAdminProduct()
    {
        $this->isAdmin();
        $productModel = new productModel(
            null,
            $_POST['nom'],
            $_POST['description'],
            $_POST['image'],
            $_POST['prix'],
            $_POST['categorie']
        );
        $productModel->addProduct(); // modification de la bdd pour ajouter un produit
        $this->adminProduct();
    }
}