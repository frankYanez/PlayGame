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
        $this->view->showLogin();
    }

    public function auth()
    {
        $user = $_POST['email'];
        $pass = $_POST['password'];
        $this->model->auth($user, $pass);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /proyectos/tpe/");
    }
}
