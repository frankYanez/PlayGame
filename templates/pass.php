<?php 

$hash = password_hash("admin", PASSWORD_DEFAULT); //POR DEFECTO ES EL BCRYPT
echo $hash;


/*
password_verify();
    //$HASH OBTIENE DE LA BASE DE DATOS
    //$PASSWORD OBTIENE DEL FORMULARIO QUE ENVIA EL USUARIO.
*/
if (password_verify("admin", $hash))
    echo "CREDENCIALES VALIDAS";

else
    echo "CREDENCIALES INVALIDAS";



?>