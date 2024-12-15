efrei_b2_serverWeb <!-- omit in toc -->
===

- [à faire](#à-faire)
- [Simple PHP Project](#simple-php-project)
- [This is a simple PHP project that uses composer to manage dependencies.](#this-is-a-simple-php-project-that-uses-composer-to-manage-dependencies)
  - [Installation](#installation)
  - [Start server using php](#start-server-using-php)
    - [You can now access the project at `http://localhost:5001` in your browser.](#you-can-now-access-the-project-at-httplocalhost5001-in-your-browser)
  - [create new user for mysql](#create-new-user-for-mysql)
  - [utilisation](#utilisation)
- [admin](#admin)


# à faire
- [x] **Accueil** : Présentation générale.
- [x] **Catalogue** : Liste de produits.
- [x] **Détail produit** : Affichage des informations sur un produit sélectionné.
- [x] **Login** : Connexion utilisateur.
- [x] **Register** : Inscription utilisateur.
- [x] **Panier** : Liste des articles ajoutés au panier.

# Simple PHP Project

# This is a simple PHP project that uses composer to manage dependencies.

## Installation

If you don't have Composer installed, you can install it by typing this command :

```bash
sudo apt-get install composer
```

Then, you can install the project dependencies by running this command :

```bash
composer install
```

## Start server using php

```bash
php -S localhost:5001 -t public
```

### You can now access the project at `http://localhost:5001` in your browser.


## create new user for mysql

```mysql
CREATE USER 'username'@'hostname' IDENTIFIED BY 'password';
```

## utilisation

# admin

log : admin@admin.com

password : adminadmin