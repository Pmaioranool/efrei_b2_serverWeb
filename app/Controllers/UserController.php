<?php
namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Controllers\CoreController;
use App\Controllers\MainController;
use App\Models\userModel;
use App\Models\commandeModel;

class UserController extends CoreController
{
    // Page "admin"
    public function admin()
    {
        $this->isAdmin();
        $this->render('user/admin');
    }
    // Page "logout"
    public function logout()
    {
        $this->isConnected();
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        $MainManager = new MainController();
        $MainManager->home();
        exit;
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

    public function loginUser()
    {
        if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['MDP']) && !empty($_POST['MDP']))) {
            $userModel = new UserModel($_POST['email'], $_POST['MDP']);
            $userMDP = $userModel->login();
            if ($userMDP['MDP'] == $_POST['MDP']) {
                $userID = $userModel->getUserId();
                $_SESSION['userID'] = $userID['id_user'];
                $userRole = $userModel->getRole();
                $_SESSION['userRole'] = $userRole['titre'];
                $MainManager = new MainController();
                $MainManager->home();
            } else {
                $this->render('user/login');
                echo '<script>alert("Mot de passe ou identifiant incorrect");</script>';
            }
        }
    }
    public function registerUser()
    {
        if (
            (isset($_POST['email']) && !empty($_POST['email']))
            && (isset($_POST['MDP']) && !empty($_POST['MDP']))
            && (isset($_POST['nom']) && !empty($_POST['nom']))
            && (isset($_POST['prenom']) && !empty($_POST['prenom']))
        ) {
            $userModel = new UserModel($_POST['email'], $_POST['MDP'], $_POST['nom'], $_POST['prenom']);
            $userID = $userModel->registerAndLog();
            $_SESSION['userID'] = $userID['id_user'];
            $userRole = $userModel->getRole();
            $_SESSION['userRole'] = $userRole['titre'];
            $CommandeModel = new CommandeModel(null, $userID);
            $CommandeModel->addCommande();
            $MainManager = new MainController();
            $MainManager->home();
        } else {
            $this->register();
        }
    }

}