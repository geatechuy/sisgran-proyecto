<?php
    include "conexion.php";

    try{
        if($_POST['submit-huerta']){
            $correo = $_POST['correo'];
            $contraseña = md5($_POST['contraseña']);
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $calle = $_POST['calle'];
            $puerta = $_POST['numero-puerta'];
            $esquina = $_POST['esquina'];
            $barrio = $_POST['barrio'];

            // Checkear si ya hay un usuario con el mismo correo
            $sqlExiste = "SELECT Correo FROM usuarios WHERE Correo='$correo'";
            $resultadoExiste = mysqli_query($con, $sqlExiste);
            $fetchExiste = $resultadoExiste->fetch_assoc();
            $correoExiste = $fetchExiste['Correo'];
            if($correoExiste==$correo){
                header("Location: ../php/error-registro.php");
                die;
            }

            // Tabla huerta ecologica
            $sqlHuerta = "INSERT INTO huerta (NombreHuerta, Calle, NroPuerta, Esquina, Tel, Correo, barrio)
                    VALUES ('$nombre', '$calle', '$puerta', '$esquina', '$telefono', '$correo', '$barrio')";

            // Tabla usuarios
            $sqlUsuarios = "INSERT INTO usuarios (nombre, Correo, contraseña, id_cargo, Estado) VALUES ('$nombre', '$correo', '$contraseña', 5, 0)";

            // Primera inserción
            $insertarHuerta=$con->query($sqlHuerta);
            if($insertarHuerta==true){
                // Segunda inserción
                $insertarUsuario=$con->query($sqlUsuarios);
            }

            // Si la segunda inserción fue exitosa
            if($insertarUsuario==true){
                header("Location: ../php/inicio-sesion.php#registrado");
            }
        }
    }catch(Exception $ex){ echo "ERROR: " . $ex->getMessage(); }