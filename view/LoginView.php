<?php

class LoginView
{
    public function showLogin()
    {
        require __DIR__ . '../../includes/templates/login.phtml';
    }

    public function showAdminWindow($juegos)
    {

        require __DIR__ . '../../includes/templates/admin.phtml';
    }
}
