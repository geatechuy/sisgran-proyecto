<?php
    include "conexion.php";

    try{
        if($_POST['submit-huerta']){
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $calle = $_POST['calle'];
            $puerta = $_POST['numero-puerta'];
            $esquina = $_POST['esquina'];
            $barrio = $_POST['barrio'];

            // Tabla huerta ecologica
            $sqlHuerta = "INSERT INTO huerta (NombreHuerta, Calle, NroPuerta, Esquina, Tel, Correo, barrio)
                    VALUES ('$nombre', '$calle', '$puerta', '$esquina', '$telefono', '$correo', '$barrio')";

            // Tabla usuarios
            $sqlUsuarios = "INSERT INTO usuarios (Correo, contraseña, id_cargo) VALUES ('$correo', '$contraseña', 4)";

            // Primera inserción
            $insertarHuerta=$con->query($sqlHuerta);
            if($insertarHuerta==true){
                // Segunda inserción
                $insertarUsuario=$con->query($sqlUsuarios);
            }

            // Si la segunda inserción fue exitosa
            if($insertarUsuario==true){
                echo "Registrado correctamente";
            }
        }
    }catch(Exception $ex){ echo "ERROR: " . $ex->getMessage(); }