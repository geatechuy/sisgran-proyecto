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
    <title>Sisgran | Usuario no encontrado</title>
</head>
<body>
    <div class="overlay"></div>
    <img class="img-fondo" src="../images/errorlogin.jpg" alt="Imagen de fondo">
    <div class="contenedor-pendiente">
        <div class="pendiente-info">
            <div class="info__header">
                <img src="../images/LogoColor.png" alt="">
            </div>
            <div class="info__body">
                <p>Los datos ingresados no son válidos, verifique si su correo y contraseña son correctos.</p>
                <a class="boton" href="../php/inicio-sesion.php">Volver al incio</a>
            </div>
        </div>
    </div>
    <script src="../javascript/temaNavegador.js"></script>
    <script src="../javascript/pantallaCarga.js"></script>
</body>
</html>