<?php

class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    public function auth($user, $pass)
    {

        //Validacion ALEXIS
        $query = "SELECT * FROM user WHERE email = '$user'  ";
        $stm = $this->db->prepare($query);
        // $stm->bindParam(":username", $user);
        $stm->execute();
        $userFound = $stm->fetch(PDO::FETCH_OBJ);


        if ($userFound) {
            session_start();

            $_SESSION['name'] = $userFound->email;

            $_SESSION['rol'] = $userFound->id_rol;
            header("Location: /proyectos/tpe/");
        }

        return $userFound->id_rol;
    }

    public function isAdmin()
    {
        session_start();
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
            return true;
        } else {
            return false;
        }
    }
}
