<?php

require __DIR__ . '/../model/LoginModel.php';
require __DIR__ . '/../view/LoginView.php';
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
        if (isset($_SESSION['name'])) {
            header("Location: /proyectos/tpe/");
        } else {
            $this->view->showLogin();
        }
    }

    public function auth()
    {
        //HASEHAR PASSWORD
        $user = $_POST['email'];
        $pass = $_POST['password'];

        $session = $this->model->auth($user, $pass);
        $this->view->showHeaderSession($session);
    }

    public function showAdminWindow()
    {
        $juegoModel = new JuegoModel();
        $juegos = $juegoModel->getJuegos();
        if ($this->model->isAdmin()) {
            $this->view->showAdminWindow($juegos);
        } else {
            header("Location: /proyectos/tpe/");
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /proyectos/tpe/");
    }
}
