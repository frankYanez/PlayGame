<?php
//Este solo muestra las vistas, requiere el template del SUCCESS o del ERROR
class JuegoView
{

    public function showGames($juegos)
    {

        require './templates/games.phtml';
    }

    public function showCategorias($categorias)
    {

        require './templates/categorias.phtml';
    }

    public function showDesarrolladores($desarrolladores)
    {
        require './templates/desarrolladores.phtml';
    }
    public function showFormularioDesarrolladores()
    {
        require './templates/createFormDesarrollador.phtml';
    }

    public function showUpdateFormDesarrollador($desarrollador)
    {
        require './templates/updateFormDesarrollador.phtml';
    }

    public function showCreateForm()
    {

        require './templates/createForm.phtml';
    }

    public function showError($error)
    {
        require './templates/error.phtml';
    }

    public function showAdminWindow($juegos)
    {

        require './templates/admin.phtml';
    }


    public function showDelete($nombre, $id)
    {

        require './templates/delete.phtml';
    }

    public function showUpdateForm($juego)
    {
        require './templates/updateForm.phtml';
    }

    public function showJuegoById($juego)
    {
        require './templates/game.phtml';
    }
}
