<?php
//Es el que hace las conexiones a la base de datos
class JuegoModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    //OBTENGO LOS DESARROLLADORES

    public function getDesarrolladores(){
        $query = $this->db->prepare('SELECT * FROM desarrollador');
        $query->execute();
        $desarrolladores = $query->fetchALL(PDO::FETCH_OBJ);
        return $desarrolladores;
    }

    //INSERTO DESARROLLADOR EN LA BD

    public function createDesarrollador($nombre, $sede, $añoFundacion, $propietario ){ //EL ID DE LA BASE DE DATOS DE DESARROLLADOR DEBERIA SER AUTOINCREMENTAL

        $query = $this->db->prepare("INSERT INTO desarrollador(nombre, sede,año_fundacion,propietario) VALUES(?,?,?,?)");
        $query->execute(array($nombre, $sede, $añoFundacion, $propietario));
        //header("Location: " . BASE_URL . "desarrolladores");

        
        //Tirar mensaje de que se agrego el usuario a la base de datos
    }


    //BORRO A UN DESARROLLADOR

    public function borrarDesarrollador($id){//VER TEMA DE INCONSISTENCIAS, POR SI BORRO UN DESARROLLADOR QUE TIENE VARIOS JUEGOS.
        $query = $this->db->prepare("DELETE FROM desarrollador WHERE id=?");
        $query->execute(array($id));
    }


    //OBTENGO JUEGO DE LA BASE DE DATOS POR ID

    public function getJuego($id)
    {
        $query = $this->db->prepare("Select * from juego where id = '$id' ");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //OBTENG JUEGO SIN FILTRO

    public function getJuegos()
    {
        $query = $this->db->prepare('SELECT * FROM juego');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //OBTENGO GENEROS QUE NO SE REPITAN


    public function getCategoria()
    {
        $query = $this->db->prepare("SELECT DISTINCT genero FROM juego");//SELECCIONA VALORES UNICOS
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN, 0);//ME DEVUELVE DE LA COLUMNA 0, AL ESTAR LOS GENEROS, ME DEVUELVE LOS MISMOS
    }

    // ES LA MISMA FUNCION QUE LA DE ARRIBA, VER EL TEMA DE REUTILIZACION

    public function getGamesByCategory($categoria)
    {
        $query = $this->db->prepare("SELECT * FROM juego WHERE genero = '$categoria'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //CREO UN NUEVO JUEGO

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

    //ELIMINO UN JUEGO

    public function deleteJuego($id)
    {
        $query = $this->db->prepare("DELETE FROM juego WHERE id = '$id'");
        $query->execute();
        header("Location: " . BASE_URL . "admin");
    }
}
