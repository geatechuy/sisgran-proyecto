<?php
    include "conexion.php";
    
    try{
        if($_POST['submit-empresa']){
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            $nombre = $_POST['nombre'];
            $rut = $_POST['rut'];
            $telefono = $_POST['telefono'];
            $calle = $_POST['calle'];
            $puerta = $_POST['numero-puerta'];
            $numero_apartamento = $_POST['numero_apartamento'];
            $esquina = $_POST['esquina'];
            $barrio = $_POST['barrio'];

            // Tabla cliente
            $sqlCliente = "INSERT INTO cliente (Correo, Calle, Esquina, NroApt, NroPuerta, barrio)
                    VALUES ('$correo', '$calle', '$esquina', '$numero_apartamento', '$puerta', '$barrio')";

            // Tabla cliente tel
            $sqlClienteTel = "INSERT INTO clientetel (Tel) VALUES ('$telefono')";

            // Tabla cliente empresa
            $sqlClienteEmpresa = "INSERT INTO clienteempresa (Nombre, RUT)
                    VALUES ('$nombre', '$rut')";

            // Tabla usuarios
            $sqlUsuarios = "INSERT INTO usuarios (Correo, contraseña, id_cargo) VALUES ('$correo', '$contraseña', 1)";


            // Primera inserción
            $insertarCliente=$con->query($sqlCliente);
            if($insertarCliente==true){
                // Segunda inserción
                $insertarClienteTel=$con->query($sqlClienteTel);

                if($insertarClienteTel==true){
                    // Tercer inserción
                    $insertarClienteEmpresa=$con->query($sqlClienteEmpresa); 

                    if($insertarClienteEmpresa==true){
                        // Cuarta inserción
                        $insertarUsuario=$con->query($sqlUsuarios);    
                    }
                }
            }

            // Si la última inserción fue exitosa
            if($insertarUsuario==true){
                echo "Registrado correctamente";
            }

        }
    }catch(Exception $ex){ echo "ERROR: " . $ex->getMessage(); }
