<?php

function isConnected()
{
    if (!$_SESSION['userID']) {
        header('Location:index.php?accueil');
    }
}

function isAdmin()
{
    if (!$_SESSION['admin'] == true) {
        header('Location:index.php?accueil');
    }
}