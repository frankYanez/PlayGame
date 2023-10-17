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
    
    //OBTIENE LOS DESARROLLADORES DE LA BASE DE DATOS

    public function showDesarrolladores($mensaje = ''){
        $desarrolladores = $this->model->getDesarrolladores();
        session_start();
        if (isset($_SESSION["User"]))//HAY UNA SESION ABIERTA
        {
        $this->view->showDesarrolladores($desarrolladores,$mensaje ='');//LE PASO A LA VISTA LOS DESARROLLADORES
        $this->view->showFormularioDesarrolladores();

        }
        else
        {

        $this->view->showDesarrolladores($desarrolladores,$mensaje ='');//LE PASO A LA VISTA LOS DESARROLLADORES
  
        }
    }
    public function createDesarrollador()
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombreDesarrollador'];
        $sede = $_POST['sedeDesarrollador'];
        $añoFundacion = $_POST['fundacionDesarrollador'];
        $propietario = $_POST['propietarioDesarrollador'];

        if ($nombre && $sede && $añoFundacion && $propietario!=null ){
        $this->model->createDesarrollador($nombre, $sede, $añoFundacion, $propietario);
        $this->showDesarrolladores("El desarrollador ha sido agregado");//NO TOMA PARAMETRO
        }  
        else{
            $this->showDesarrolladores("El desarrollador no ha sido agregado");//NO TOMA PARAMETRO
        }
        
    } else {
        $this->showDesarrolladores("El desarrollador no se puede agregar");//NO TOMA PARAMETRO
        // Manejar la situación si alguien intenta acceder directamente a createDesarrollador sin enviar datos.
        // Puedes redirigir a otra página o mostrar un mensaje de error.
    }
    }
    
    //ELIMINO DESARROLLADOR

    public function borrarDesarrollador($id){ //O BORRAR POR NOMBRE POR NOMBRE
        $this->model->borrarDesarrollador($id);
        header("Location: " . BASE_URL);
    }
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
