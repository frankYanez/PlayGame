<?php
require './app/model/LoginModel.php';
require './app/view/LoginView.php';

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
        if ($dbUser != null){ //verifico primer que el usuario existe
            if (password_verify($pass,$dbUser[0]["password"])){ //

                echo ("Ingreso correcto");
            }
            else {//La contaseña es incorrecta
                $this->view->showLogin("Contraseña Incorrecta");
            }
        }
        else { //no existe el usuario
            $this->view->showLogin("El usuario no existe");
        }    
    }

    /*
    public function showAdminWindow()
    {
        $juegoModel = new JuegoModel();
        $juegos = $juegoModel->getJuegos();
        if ($this->model->isAdmin()) {
            $this->view->showAdminWindow($juegos);
        } else {
            header("../../templates/header.phtml");
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("../../templates/header.phtml");
    }*/
}
