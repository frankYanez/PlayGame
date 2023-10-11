<?php


//Abrimos base de datos
$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

//Preparamos la consulta
$query = $db->prepare('SELECT * FROM juegos WHERE nombre = ?');
$query->execute();

//obtengo todos los datos
$datos = $query->fetchAll(PDO::FETCH_OBJ);

echo "<ul>";
foreach ($datos as $dato) {
    echo "<li>$dato->nombre</li>";
}
echo "</ul>";


//TODO: Relacionar tabalas ejemplo: juegos y desarrolladores_ID
//Preguntas: Como gestionar la parte del administrador, que es lo que solicitan? - Documento completo otorgado por la catedra- Preguntamos por singular o plural del nombre de las tablas - Para las modificaciones de la tabla se manejan solamente desde PHP my admin?