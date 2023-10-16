<?php
//Es el que hace las conexiones a la base de datos
class JuegoModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    public function getJuego($id)
    {
        $query = $this->db->prepare("Select * from juego where id = '$id' ");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
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

    public function createJuego($nombre, $genero, $año)
    {
        //HASTA ACA QUEDE Y NO FUNCIONABA
        if (empty($nombre) || empty($genero) || empty($año)) {
            header("Location: " . BASE_URL . "createForm");
        } else {

            $query = $this->db->prepare("INSERT INTO juego(nombre, genero, desarrollador_id, año_lanzamiento) VALUES('$nombre', '$genero', 100, '$año')");
            $query->execute();
            header("Location: " . BASE_URL . "admin");
        }
    }

    public function updateJuego($id, $nombre, $genero, $año)
    {
        $query = $this->db->prepare("UPDATE juego SET nombre = '$nombre', genero = '$genero', año_lanzamiento = '$año' WHERE id = '$id'");
        $query->execute();
        header("Location: " . BASE_URL . "admin");
    }

    public function deleteJuego($id)
    {
        $query = $this->db->prepare("DELETE FROM juego WHERE id = '$id'");
        $query->execute();
        header("Location: " . BASE_URL . "admin");
    }
}
