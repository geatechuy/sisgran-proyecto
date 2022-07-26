<?php
    include '../../../includes/conexion.php';

    if(isset($_POST['agregar'])){
        $correo = $_POST['correo'];
        $contraseña = md5($_POST['contraseña']);
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $ci = $_POST['ci'];
        $telefono = $_POST['telefono'];
        $calle = $_POST['calle'];
        $puerta = $_POST['puerta'];
        $numero_apartamento = $_POST['apartamento'];
        $esquina = $_POST['esquina'];
        $barrio = $_POST['barrio'];

        // Checkear si ya hay un usuario con el mismo correo
        $sqlExiste = "SELECT Correo FROM usuarios WHERE Correo='$correo'";
        $resultadoExiste = mysqli_query($con, $sqlExiste);
        $fetchExiste = $resultadoExiste->fetch_assoc();
        $correoExiste = $fetchExiste['Correo'];
        if($correoExiste==$correo){
            header("Location: ../error-registro.php");
            die;
        }

        // Tabla cliente
        $sqlCliente = "INSERT INTO cliente (Correo, Calle, Esquina, NroApt, NroPuerta, barrio)
        VALUES ('$correo', '$calle', '$esquina', '$numero_apartamento', '$puerta', '$barrio')";

        // Tabla usuarios
        $sqlUsuarios = "INSERT INTO usuarios (nombre, apellido, Correo, contraseña, id_cargo, Estado) VALUES ('$nombre', '$apellido', '$correo', '$contraseña', 6, 2)";

        // Primera inserción
        $insertarCliente=$con->query($sqlCliente);
        if($insertarCliente==true){
            $sqlNroCliente = "SELECT NroCliente FROM cliente ORDER BY NroCliente DESC LIMIT 1";
            $resultado = mysqli_query($con, $sqlNroCliente);
            $NroClienteArray = $resultado->fetch_assoc();
            $NroCliente = implode($NroClienteArray);

            // Tabla cliente tel
            $sqlClienteTel = "INSERT INTO clientetel (NroCliente, Tel) VALUES ('$NroCliente', '$telefono')";

            // Tabla cliente web
            $sqlClienteWeb = "INSERT INTO clienteweb(NroCliente, Nombre, Apellido, CI)
            VALUES ('$NroCliente', '$nombre', '$apellido', '$ci')";

            // Segunda inserción
            $insertarClienteTel=$con->query($sqlClienteTel);

            if($insertarClienteTel==true){
                // Tercer inserción
                $insertarClienteWeb=$con->query($sqlClienteWeb); 

                if($insertarClienteWeb==true){
                    // Cuarta inserción
                    $insertarUsuario=$con->query($sqlUsuarios);
                    header("Location: ../administracion.php#clientes");    
                }else{
                    echo "ERROR AL INGRESAR LA HUERTA";
                }
            }
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
    <title>Sisgran - Agregar cliente</title>
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
            <h1>Agregar cliente</h1>
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
                    <label>Correo:</label>
                    <input type="email" name="correo" placeholder="Su correo electrónico" required>
                </fieldset>
                <fieldset>
                    <label>Contraseña:</label>
                    <input type="password" name="contraseña" placeholder="Su contraseña" required>
                </fieldset>
                <fieldset>
                    <label>Telefono:</label>
                    <input type="number" name="telefono" placeholder="Su teléfono" min="1000" required>
                </fieldset>
                <fieldset>
                    <label>CI:</label>
                    <input type="number" name="ci" placeholder="Su CI" min="1000000" required>
                </fieldset>
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
                    <input type="number" name="puerta" placeholder="Su número de puerta" min="1" required>
                </fieldset>
                <fieldset>
                    <label>Apartamento:</label>
                    <input type="number" name="apartamento" placeholder="Su número de apartamento" min="1">
                </fieldset>
                <div>
                    <input type="submit" value="Agregar" name="agregar" class="boton">
                    <a href="../administracion.php#clientes" name="cancelar" class="boton">Cancelar</a>
                </div>
            </form>
        </main>
    </div>
    <script src="../../javascript/pantallaCarga.js"></script>
    <script src="../../javascript/temaNavegador.js"></script>
</body>