<?php
require './app/model/LoginModel.php';
require './app/view/LoginView.php';
//require './app/model/JuegoModel.php';

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
    {/*
        if (isset($_SESSION['email'])) {
            header("../../templates/header.phtml");
        } else 
*/
            $this->view->showLogin();
        
    }
    //
    

    public function auth()
    {
        //HASEHAR PASSWORD
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $dbUser = $this->model->getUser($user); //me traigo el usuario de la bd que se llame como $user
        if ($dbUser != null){ //verifico primer que el usuario
            if (password_verify($pass,$dbUser[0]["password"])){ //
                session_start();
                $_SESSION["User"] = $user;
                header("Location: " . BASE_URL);
            }
            else {//La contaseña es incorrecta
                $this->view->showLogin("Contraseña Incorrecta");
            }
        }
        else { //no existe el usuario
            $this->view->showLogin("El usuario no existe");
        }    
    }
    //FALTA TODO LO DE MANTENER ABIERTA LA SESSION
    //VER VENTANA DE ADMINISTRADOR
    public function showAdminWindow()
    {
        $juegoModelo = new JuegoModel();
        $juegos = $juegoModelo->getJuegos();
        if ($this->model->isAdmin()) { //ME QUEDE ACA
            echo("Es admin");
           // $this->view->showAdminWindow($juegos);
        } else {
            echo("no es admin");
            //header("../../templates/header.phtml");
        }
    }

    /*public function logout()
    {
        session_start();
        session_destroy();
        header("../../templates/header.phtml");
    }*/
}
