<?php

class LoginView
{
    public function showLogin($mensaje = '') 
     
    {
        require './templates/login.phtml';
    }

    public function showAdminWindow($juegos)
    {

        require './templates/admin.phtml';
    }
}
