<?php
require './app/model/JuegoModel.php';
require './app/view/JuegoView.php';
require_once './app/helper/LoginHelper.php';



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

    public function showDesarrolladores()
    {
        LoginHelper::init();
        $desarrolladores = $this->model->getDesarrolladores();
        if (isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME'])) //HAY UNA SESION ABIERTA
        {
            $this->view->showDesarrolladores($desarrolladores); //LE PASO A LA VISTA LOS DESARROLLADORES
            $this->view->showFormularioDesarrolladores();
        } else {

            $this->view->showDesarrolladores($desarrolladores); //LE PASO A LA VISTA LOS DESARROLLADORES

        }
    }

    //CREO UN DESARROLLADOR AL PRESIONAR EN EL BOTON "AGREGAR" DEL FORMULARIO
    public function createDesarrollador()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombreDesarrollador'];
            $sede = $_POST['sedeDesarrollador'];
            $añoFundacion = $_POST['fundacionDesarrollador'];
            $propietario = $_POST['propietarioDesarrollador'];

            if ($nombre && $sede && $añoFundacion && $propietario != null) {
                $this->model->createDesarrollador($nombre, $sede, $añoFundacion, $propietario);
                $this->showDesarrolladores(); //NO TOMA PARAMETRO
                // $this->view->showError("Desarrollador agregado");
            } else {
                $this->showDesarrolladores(); //NO TOMA PARAMETRO
                $this->view->showError("No se puede agregar desarrollador, completar todos los campos");
            }
        } else {
            $this->showDesarrolladores(); //NO TOMA PARAMETRO
            // Manejar la situación si alguien intenta acceder directamente a createDesarrollador sin enviar datos.
            // Puedes redirigir a otra página o mostrar un mensaje de error.
        }
    }

    //OBTENGO DESARROLLADOR

    public function getDesarrollador($id)
    {
        $desarrollador = $this->model->getDesarrollador($id);
        $this->view->showUpdateFormDesarrollador($desarrollador);
    }

    public function updateDesarrollador($dId, $dNombre, $dSede, $dAño, $dProp)
    {

        $this->model->updateDesarrollador($dId, $dNombre, $dSede, $dAño, $dProp);
        $this->showDesarrolladores();
    }



    //ELIMINO DESARROLLADOR

    public function deleteDesarrollador($id)
    { //O BORRAR POR NOMBRE POR NOMBRE
        $this->model->borrarDesarrollador($id);
    }
    //OBTENGO LAS CATEGORIAS
    public function showCategoria()
    {

        $categorias = $this->model->getCategoria();
        $this->view->showCategorias($categorias); //LE PASO A LA VISTA LAS CATEGORIAS
    }

    public function getCategorias()
    {
        $categorias = $this->model->getCategoria();
        return $categorias;
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



    //Vista de Edicion Administrador
    public function showJuegosAdmin()
    {
        $juegos = $this->model->getJuegos();
        $this->view->showAdminWindow($juegos);
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

    public function updateJuegoAsk($id)
    {
        $juego = $this->model->getJuego($id);
        $this->view->showUpdateForm($juego);
    }

    public function updateJuego($id)
    {
        $this->model->updateGame($id, $_POST['nombre'], $_POST['genero'], $_POST['año']);
    }


    public function showJuego($id)
    {
        $juego = $this->model->getJuego($id);
        $this->view->showJuegoById($juego);
    }
}
