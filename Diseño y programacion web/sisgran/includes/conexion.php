<?php
    // Define las variables de conexión
    $DB_servidor = 'localhost:3310';
    $DB_usuario = 'root';
    $DB_contraseña = '';
    $DB_nombre = 'geatech';

    // Crea la conexión con la base de datos
    $con = new mysqli($DB_servidor, $DB_usuario, $DB_contraseña, $DB_nombre);

    //Comprueba la conexión (descomentar solo en caso de tener problemas con conexion a bd)
    // if ($con->connect_error) {
    // die("Conexión fallida: " . $con->connect_error);
    // }
    // echo "Conectado con éxito";