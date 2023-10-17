<?php

class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    //ME TRAE EL USUARIO
    public function getUser($user){

        $query = $this->db->prepare ("SELECT * FROM usuario WHERE user=?  limit 1");
        $query -> execute(array($user));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    /*

    public function auth($user, $pass)
    {

        //Validacion ALEXIS

        
        $query = "SELECT * FROM user WHERE  = '$user'  ";
        $stm = $this->db->prepare($query);
        // $stm->bindParam(":username", $user);
        $stm->execute();
        $userFound = $stm->fetch(PDO::FETCH_OBJ);


        if ($userFound) {
            session_start();

            $_SESSION['name'] = $userFound->email;

            $_SESSION['rol'] = $userFound->id_rol;
            header("Location: " . BASE_URL);
        }

        return $userFound->id_rol;
    }
*/
    public function isAdmin()
    {
        session_start();
        if (isset($_SESSION['USER_ID']) /*&& $_SESSION['rol'] == 1*/) {
            return true;
        } else {
            return false;
        }
    }
}
