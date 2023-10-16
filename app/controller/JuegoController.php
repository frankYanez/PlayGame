<?php
require './app/model/JuegoModel.php';
require './app/view/JuegoView.php';


class JuegoController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new JuegoModel();
        $this->view = new JuegoView();
    }
    
    //OBTENER LOS DESARROLLADORES DE LA BASE DE DATOS (FALTA LLEVARLO A LA VISTA)

    public function showDesarrolladores(){
        $desarrolladores = $this->model->getDesarrolladores();
        $this->view->showDesarrolladores($desarrolladores);//LE PASO A LA VISTA LOS DESARROLLADORES
    }

    //INSERTO DESARROLLADOR
    
    public function insertarDesarrollador(){ //CONDICIONAL POR SI ALGUN CAMPO ESTA VACIO
        $this->model->insertarDesarrollador($_POST['nombre'],$_POST['sede'],$_POST['año_fundacion'],$_POST['propietario'] );
        header("Location: " . BASE_URL);

    }

    //ELIMINO DESARROLLADOR

    public function borrarDesarrollador($id){ //O BORRAR POR NOMBRE POR NOMBRE
        $this->model->borrarDesarrollador($id);
        header("Location: " . BASE_URL);


    }

    //CREO DESARROLLADOR

   /* public function createDesarrollador()
    {
        $this->model->createDesarrollador($_POST['nombreDesarrollador'], $_POST['sedeDesarrrollador'], $_POST['fundacionDesarrrollador'],$_POST['propietarioDesarrrollador']);

    }*/

    public function createDesarrollador()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombreDesarrollador'];
        $sede = $_POST['sedeDesarrollador'];
        $añoFundacion = $_POST['fundacionDesarrollador'];
        $propietario = $_POST['propietarioDesarrollador'];

        $this->model->createDesarrollador($nombre, $sede, $añoFundacion, $propietario);
    } else {
        echo("NO SE PUEDE AGREGAR");
        // Manejar la situación si alguien intenta acceder directamente a createDesarrollador sin enviar datos.
        // Puedes redirigir a otra página o mostrar un mensaje de error.
    }
}

    //OBTENGO CATEGORIAS

    //OBTENGO LAS CATEGORIAS

    public function showCategoria()
    {
        
        $categorias = $this->model->getCategoria();
        $this->view->showCategorias($categorias);//LE PASO A LA VISTA LOS DESARROLLADORES
    }

    //OBTENGO JUEGOS POR CATEGORIA
    
    public function showGamesByCategory($categoria)
    {
        
        $juegos = $this->model->getGamesByCategory($categoria);
        $this->view->showGames($juegos);
    }

    //OBTENGO JUEGOS
    
    public function showJuegos()
    {
        $juegos = $this->model->getJuegos();
        $this->view->showGames($juegos);
    }

    //CREO JUEGO
        
    public function createJuego()
    {

        $this->model->createJuego($_POST['nombreJuego'], $_POST['genero'], $_POST['año']);
    }

    //ELIMINO JUEGO

    public function deleteJuegoAsk($id)
    {
        echo $id;
        $juego = $this->model->getJuego($id);
        $this->view->showDelete($juego->nombre, $id);
    }

    public function deleteJuego($id)
    {
        $this->model->deleteJuego($id);
    }
    //TODO CRUD JUEGO

    public function showCreateForm()
    {
        $this->view->showCreateForm();
    }
}
