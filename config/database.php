<?php

function conectarDB()
{


    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

    $query = $db->prepare('SELECT * FROM juego');
    $query->execute();

    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($data) {
        echo "conectada";
    } else {
        echo "no conectada";
    }

    return $data;
}
