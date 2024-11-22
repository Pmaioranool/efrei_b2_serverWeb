<?php

include_once 'model/userModel.php';


if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        if (isUser($_POST['email']) == true) {
            if (isset($_POST['id_user']) && !empty($_POST['id_user'])) {
            } else {
                include_once 'view/login';
            }
        } else {
            include_once 'view/register';
        }
    } else {
        include_once 'view/email.php';
    }
}