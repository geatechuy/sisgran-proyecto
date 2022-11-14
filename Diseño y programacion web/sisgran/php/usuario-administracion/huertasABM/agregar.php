<?php
    include '../../../includes/conexion.php';

    if(isset($_POST['agregar'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = md5($_POST['contraseña']);
        $telefono = $_POST['telefono'];
        $metros = $_POST['metros'];
        $barrio = $_POST['barrio'];
        $calle = $_POST['calle'];
        $esquina = $_POST['esquina'];
        $puerta = $_POST['puerta'];

        // Checkear si ya hay un usuario con el mismo correo
        $sqlExiste = "SELECT Correo FROM usuarios WHERE Correo='$correo'";
        $resultadoExiste = mysqli_query($con, $sqlExiste);
        $fetchExiste = $resultadoExiste->fetch_assoc();
        $correoExiste = $fetchExiste['Correo'];
        if($correoExiste==$correo){
            header("Location: ../error-registro.php");
            die;
        }

        // Tabla huerta ecologica
        $sqlHuerta = "INSERT INTO huerta (NombreHuerta, Calle, NroPuerta, Esquina, Tel, Correo, barrio)
        VALUES ('$nombre', '$calle', '$puerta', '$esquina', '$telefono', '$correo', '$barrio')";

        // Tabla usuarios
        $sqlUsuarios = "INSERT INTO usuarios (Correo, contraseña, id_cargo, Estado) VALUES ('$correo', '$contraseña', 5, 2)";

        // Primera inserción
        $insertarHuerta=$con->query($sqlHuerta);
        if($insertarHuerta==true){
            // Segunda inserción
            $insertarUsuario=$con->query($sqlUsuarios);
            header("location: ../administracion.php#huertas");
        }else{
            echo "ERROR AL INGRESAR LA HUERTA";
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
    <title>Sisgran - Agregar huerta</title>
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
            <h1>Agregar huerta</h1>
            <form action="agregar.php" method="post" class="agregar-usuario">
                <fieldset>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Su nombre" required>
                </fieldset>
                <fieldset>
                    <label>Correo:</label>
                    <input type="email" name="correo" placeholder="Su correo" required>
                </fieldset>
                <fieldset>
                    <label>Contraseña:</label>
                    <input type="password" name="contraseña" placeholder="Su contraseña" required>
                </fieldset>
                <fieldset>
                    <label>Teléfono:</label>
                    <input type="number" name="telefono" min="1000" placeholder="Su teléfono" required>
                </fieldset>
                <!-- <fieldset>
                    <label>Metros cuadrados:</label>
                    <input type="number" name="metros">
                </fieldset> -->
                <fieldset>
                    <label>Barrio:</label>
                    <input type="text" name="barrio" placeholder="Su barrio" required>
                </fieldset>
                <fieldset>
                    <label>Calle:</label>
                    <input type="text" name="calle" placeholder="Su calle" required>
                </fieldset>
                <fieldset>
                    <label>Esquina:</label>
                    <input type="text" name="esquina" placeholder="Su esquina" required>
                </fieldset>
                <fieldset>
                    <label>Puerta:</label>
                    <input type="number" name="puerta" min="1" placeholder="Su número de puerta" required>
                </fieldset>
                <div>
                    <input type="submit" value="Agregar" name="agregar" class="boton">
                    <a href="../administracion.php#huertas" name="cancelar" class="boton">Cancelar</a>
                </div>
            </form>
        </main>
    </div>
    <script src="../../javascript/pantallaCarga.js"></script>
    <script src="../../javascript/temaNavegador.js"></script>
</body>