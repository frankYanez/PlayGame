<?php
require './app/model/LoginModel.php';
require './app/view/LoginView.php';
require_once './app/helper/LoginHelper.php';


// define('Inicio', '//' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');


class LoginController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->view = new LoginView();
    }

    public function showLogin()
    {
        $this->view->showLogin();
    }

    public function auth()
    {
        //HASEHAR PASSWORD
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $dbUser = $this->model->getUser($user); //me traigo el usuario de la bd que se llame como $user

        if ($dbUser != null) { //verifico primero que el usuario que me traje, exista
            if (password_verify($pass, $dbUser[0]["password"])) {
                LoginHelper::login($dbUser);
                header("Location: " . BASE_URL);
                echo ($dbUser);
            } else { //La contaseña es incorrecta
                $this->view->showLogin("Contraseña Incorrecta");
            }
        } else { //no existe el usuario
            $this->view->showLogin("El usuario no existe");
        }
    }
    //FALTA TODO LO DE MANTENER ABIERTA LA SESSION
    //VER VENTANA DE ADMINISTRADOR


    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}
