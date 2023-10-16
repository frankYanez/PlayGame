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

    public function showCreateForm()
    {

        require './templates/createForm.phtml';
    }

    public function showDelete($nombre, $id)
    {
        
        require './templates/delete.phtml';
    }
    
}


