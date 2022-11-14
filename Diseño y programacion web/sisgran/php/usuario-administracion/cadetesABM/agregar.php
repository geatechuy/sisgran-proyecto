<?php
    include '../../../includes/conexion.php';

    if(isset($_POST['agregar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contraseña = md5($_POST['contraseña']);
        $ci = $_POST['ci'];

        // Checkear si ya hay un usuario con el mismo correo
        $sqlExiste = "SELECT Correo FROM usuarios WHERE Correo='$correo'";
        $resultadoExiste = mysqli_query($con, $sqlExiste);
        $fetchExiste = $resultadoExiste->fetch_assoc();
        $correoExiste = $fetchExiste['Correo'];
        if($correoExiste==$correo){
            header("Location: ../error-registro.php");
            die;
        }

        // Tabla repartidor
        $sqlRepartidor = "INSERT INTO repartidor (CI, Nombre, Correo, Apellido)
        VALUES ('$ci', '$nombre', '$correo', '$apellido')";

        // Tabla usuarios
        $sqlUsuarios = "INSERT INTO usuarios (Nombre, Apellido, Correo, contraseña, id_cargo, Estado) VALUES ('$nombre', '$apellido', '$correo', '$contraseña', 4, 2)";

        // Primera inserción
        $insertarRepartidor=$con->query($sqlRepartidor);
        if($insertarRepartidor==true){
            // Segunda inserción
            $insertarUsuario=$con->query($sqlUsuarios);
            header("location: ../administracion.php#cadetes");
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
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Agregar cadete</title>
</head>
<body>
    <div class="grid">
        <header class="grid__header">
            <a class="logo" href="#">
                <img class="logo" src="../../../images/logoColorHoja.png" alt="Logo Sisgran">
            </a>
            <a href="../../../includes/cerrar-sesion.php" class="boton cerrar-sesion-boton">Cerrar sesión</a>
        </header>
        <main class="grid__main">
            <h1>Agregar cadete</h1>
            <form action="agregar.php" method="post" class="agregar-usuario">
                <fieldset>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Su nombre" required>
                </fieldset>
                <fieldset>
                    <label>Apellido:</label>
                    <input type="text" name="apellido" placeholder="Su apellido" required>
                </fieldset>
                <fieldset>
                    <label>CI:</label>
                    <input type="number" name="ci" min="1000000" placeholder="Su CI" required>
                </fieldset>
                <fieldset>
                    <label>Correo:</label>
                    <input type="email" name="correo" placeholder="Su correo electrónico" required>
                </fieldset>
                <fieldset>
                    <label>Contraseña:</label>
                    <input type="password" name="contraseña" placeholder="Su contraseña" required>
                </fieldset>
                <div>
                    <input type="submit" value="Agregar" name="agregar" class="boton">
                    <a href="../administracion.php#cadetes" name="cancelar" class="boton">Cancelar</a>
                </div>
            </form>
        </main>
    </div>
    <script src="../../javascript/pantallaCarga.js"></script>
    <script src="../../javascript/temaNavegador.js"></script>
</body>