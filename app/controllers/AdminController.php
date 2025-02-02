<?php

namespace app\controllers;

use app\models\AdminModel;
use Flight;

class AdminController
{
    public function __construct() {}

    public function goLoginAdmin()
    {
        Flight::render('loginAdmin');
    }

    public function verifierLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $AdminModel = new AdminModel(Flight::db());
        $con = $AdminModel->verifierLogin($email, $password);
        Flight::json(['con' => $con]);
    }
}
