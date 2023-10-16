<?php

class LoginView
{
    public function showLogin()
    {
        require __DIR__ . '../../templates/login.phtml';
    }

    public function showAdminWindow($juegos)
    {

        require __DIR__ . '../../templates/admin.phtml';
    }

    public function showHeaderSession($session)
    {
        require __DIR__ . '../../templates/header.phtml';
        require __DIR__ . '../../templates/home.phtml';
    }
}
