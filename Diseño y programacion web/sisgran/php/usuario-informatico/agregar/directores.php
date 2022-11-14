<?php 

include '../../../includes/conexion.php'; 

session_start();

if(isset($_POST['agregar'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contraseña = md5($_POST['contraseña']);

    $sql = "INSERT INTO usuarios (nombre, apellido, Correo, contraseña, id_cargo, Estado) VALUES ('$nombre', '$apellido', '$correo', '$contraseña', 2, 2)";
    $resultado = mysqli_query($con, $sql);

    if($resultado==true){
        header("Location: ../agregado.php");
    }else{
        header("Location: ../noAgregado.php");
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../informatico.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/4ac277a656.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Agregar directores</title>
</head>
<body>
    <div class="grid">
        <header class="grid__header">
            <a class="logo" href="#">
                <img class="logo" src="../../../images/logoColorHoja.png" alt="Logo Sisgran">
            </a>
            <p class="nombre-usuario">Agregar directores</p>
            <a href="../../../includes/cerrar-sesion.php" class="boton cerrar-sesion-boton">Cerrar sesión</a>
        </header>
        <main class="grid__main">
            <form action="directores.php" class="agregar-form" method="POST">
                <fieldset>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Su nombre" required>
                </fieldset>
                <fieldset>
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" placeholder="Su apellido" required>
                </fieldset>
                <fieldset>
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="correo" placeholder="Su correo electrónico" required>
                </fieldset>
                <fieldset>
                    <label for="contraseña">Contraseña:</label>
                    <input type="password" name="contraseña" placeholder="Su contraseña" required>
                </fieldset>
                <div>
                    <input type="submit" value="Agregar usuario" name="agregar" class="boton">
                    <a href="../informatico.php" name="cancelar" class="boton">Cancelar</a>
                </div>
            </form>
        </main>
    </div>
    <script src="../../javascript/pantallaCarga.js"></script>
    <script src="../../javascript/temaNavegador.js"></script>
</body>
</html>