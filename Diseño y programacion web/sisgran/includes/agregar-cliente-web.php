<?php
    include "conexion.php";

    try{
        if($_POST['submit-web']){
            $documento = $_POST['documento'];
            $CI = $_POST['ci'];
            $pasaporte = $_POST['pasaporte-letra'] . $_POST['pasaporte-numeros'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $calle = $_POST['calle'];
            $puerta = $_POST['numero-puerta'];
            $numero_apartamento = $_POST['numero-apartamento'];
            $esquina = $_POST['esquina'];
            $barrio = $_POST['barrio'];

            // Tabla cliente
            $sqlCliente = "INSERT INTO cliente (Correo, Calle, Esquina, NroApt, NroPuerta, barrio)
                    VALUES ('$correo', '$calle', '$esquina', '$numero_apartamento', '$puerta', '$barrio')";

            // Tabla cliente tel
            $sqlClienteTel = "INSERT INTO clientetel (Tel) VALUES ('$telefono')";

            // Tabla cliente web
            if($CI==''){
                $sqlClienteWeb = "INSERT INTO clienteweb (Nombre, Apellido, CI)
                VALUES ('$nombre', '$apellido', '$pasaporte')";
            }else{
                $sqlClienteWeb = "INSERT INTO clienteweb (Nombre, Apellido, CI)
                VALUES ('$nombre', '$apellido', '$CI')";
            }


            // Tabla usuarios
            $sqlUsuarios = "INSERT INTO usuarios (Correo, contraseña, id_cargo) VALUES ('$correo', '$contraseña', 1)";

            // Primera inserción
            $insertarCliente=$con->query($sqlCliente);
            if($insertarCliente==true){
                // Segunda inserción
                $insertarClienteTel=$con->query($sqlClienteTel);

                if($insertarClienteTel==true){
                    // Tercer inserción
                    $insertarClienteWeb=$con->query($sqlClienteWeb); 

                    if($insertarClienteWeb==true){
                        // Cuarta inserción
                        $insertarUsuario=$con->query($sqlUsuarios);    
                    }
                }
            }

            // Si la última inserción fue exitosa
            if($insertarUsuario==true){
                echo "Registrado correctamente";
                echo $pasaporte;
            }

        }
    }catch(Exception $ex){ echo "Error " . $ex->getMessage(); }