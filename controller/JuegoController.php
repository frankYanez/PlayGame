<?php
require __DIR__ . '/../model/JuegoModel.php';
require __DIR__ . '/../view/JuegoView.php';
class JuegoController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new JuegoModel();
        $this->view = new JuegoView();
    }


    public function showJuegos()
    {
        $juegos = $this->model->getJuegos();
        $this->view->showGames($juegos);
    }

    public function showCategoria()
    {

        $pelis = $this->model->getCategoria($categoria = null);
        $this->view->showCategorias($pelis);
    }

    public function showGamesByCategory($categoria)
    {

        $juegos = $this->model->getGamesByCategory($categoria);
        $this->view->showGames($juegos);
    }

    public function createJuego()
    {

        $this->model->createJuego($_POST['nombreJuego'], $_POST['genero'], $_POST['año']);
    }

    public function updateJuegoAsk($id)
    {
        $juego = $this->model->getJuego($id);
        $this->view->showUpdateForm($juego);
    }

    public function updateJuego($id)
    {

        $this->model->updateJuego($id, $_POST['nombre'], $_POST['genero'], $_POST['año']);
    }

    public function deleteJuegoAsk($id)
    {
        $juego = $this->model->getJuego($id);
        $this->view->showDelete($juego->nombre, $id);
    }

    public function deleteJuego($id)
    {
        $this->model->deleteJuego($id);
    }

    public function showJuego($id)
    {
        $juego = $this->model->getJuego($id);
        $this->view->showJuegoById($juego);
    }

    //TODO CRUD JUEGO

    public function showCreateForm()
    {
        $this->view->showCreateForm();
    }
}
