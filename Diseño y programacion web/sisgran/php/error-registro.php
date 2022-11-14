<?php

// Bloque de código para borrar la sesión iniciada ya que no está autorizado
session_start();
session_unset();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/globales.css">
    <link rel="stylesheet" href="../css/pendiente.css">
    <title>Sisgran | Correo existente</title>
</head>
<body>
    <div class="overlay"></div>
    <img class="img-fondo" src="../images/registro.jpg" alt="Imagen de fondo">
    <div class="contenedor-pendiente">
        <div class="pendiente-info">
            <div class="info__header">
                <img src="../images/LogoColor.png" alt="">
            </div>
            <div class="info__body">
                <p>El correo que usted ha ingresado ya se encuentra en el sistema, intente usando otro correo electrónico.</p>
                <a class="boton" href="../php/registro.php">Volver al registro</a>
            </div>
        </div>
    </div>
    <script src="../javascript/temaNavegador.js"></script>
    <script src="../javascript/pantallaCarga.js"></script>
</body>
</html>