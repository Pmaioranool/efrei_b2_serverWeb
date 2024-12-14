<?php

// On va imaginer qu'il y a un dossier App puis un dossier controller dedans et on va ranger cette classe (CatalogController) dedans
namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Controllers\MainController;

class CoreController
{
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
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once __DIR__ . '/../Views/partials/header.php';
            require_once $viewFile;
            require_once __DIR__ . '/../Views/partials/footer.php';
        } else {
            echo "View not found: $view";
        }
    }

    public function isConnected()
    {
        if (!$_SESSION['userID']) {
            header('Location: /');
        }
    }

    public function isAdmin()
    {
        $this->isConnected();
        if (!$_SESSION['userRole'] == 'ADMIN') {
            header('Location: /');
        }

    }

}