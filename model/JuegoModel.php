<?php
//Es el que hace las conexiones a la base de datos
class JuegoModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    public function getJuegos()
    {
        $query = $this->db->prepare('SELECT * FROM juego');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoria($categoria)
    {

        $query = $this->db->prepare("SELECT *  FROM juego WHERE genero = '$categoria'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getGamesByCategory($categoria)
    {
        $query = $this->db->prepare("SELECT * FROM juego WHERE genero = '$categoria'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
