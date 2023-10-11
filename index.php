<?php
require(__DIR__ . '/config.php');
require(__DIR__ . '/router.php');




//Para incluir las clases de forma automática
function mi_autocargador($clase)
{
    require __DIR__ . '/classes/' . $clase . '.php';
}

spl_autoload_register('mi_autocargador');

// $juego = new Juego();



//Conectar a la BD
$db = new mysqli('localhost', 'root', '', 'test');

// var_dump($db);

// include './includes/templates/footer.php';
