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
        $query = "SELECT * FROM user WHERE email = '$user' ";
        $stm = $this->db->prepare($query);
        // $stm->bindParam(":username", $user);
        $stm->execute();
        $userFound = $stm->fetch(PDO::FETCH_OBJ);


        if ($userFound) {
            session_start();
            $_SESSION['email'] = $userFound->email;
            header("Location: /proyectos/tpe/");
        }
    }
}
