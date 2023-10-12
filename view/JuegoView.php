<?php
//Este solo muestra las vistas, requiere el template del SUCCESS o del ERROR
class JuegoView
{

    public function showGames($juegos)
    {

        require __DIR__ . '../../templates/games.phtml';
    }

    public function showCategorias($categorias)
    {
        require __DIR__ . '../../templates/categorias.phtml';
    }

    public function showCreateForm()
    {

        require __DIR__ . '../../templates/createForm.phtml';
    }

    public function showDelete($nombre, $id)
    {
        require __DIR__ . '../../templates/delete.phtml';
    }
}
