<?php
require '../config/database.php';

//Conectar a la BD
conectarDB();
?>

<form method="POST" action="/admin/juegos/crear.php">
    <label for="nombre">Nombre</label>
    <input id="nombre" type="text">
    <label for="genero">genero</label>
    <input id="genero" type="text">
    <label for="anio">Año</label>
    <input id="anio" type="text">
    <label for="image">image</label>
    <input id="image" type="file" accept="image/jpeg">

    <button type="submit">Enviar</button>
</form>