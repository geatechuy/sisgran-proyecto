<?php
    include "conexion.php";
    
    try{
        if($_POST['submit-empresa']){
            $correo = $_POST['correo'];
            $contraseña = md5($_POST['contraseña']);
            $nombre = $_POST['nombre'];
            $rut = $_POST['rut'];
            $telefono = $_POST['telefono'];
            $calle = $_POST['calle'];
            $puerta = $_POST['numero-puerta'];
            $numero_apartamento = $_POST['numero_apartamento'];
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

            // Tabla cliente
            $sqlCliente = "INSERT INTO cliente (Correo, Calle, Esquina, NroApt, NroPuerta, barrio)
                    VALUES ('$correo', '$calle', '$esquina', '$numero_apartamento', '$puerta', '$barrio')";

            // Tabla usuarios
            $sqlUsuarios = "INSERT INTO usuarios (nombre, Correo, contraseña, id_cargo, Estado) VALUES ('$nombre', '$correo', '$contraseña', 6, 0)";

            // Primera inserción
            $insertarCliente=$con->query($sqlCliente);
            if($insertarCliente==true){
                $sqlNroCliente = "SELECT NroCliente FROM cliente ORDER BY NroCliente DESC LIMIT 1";
                $resultado = mysqli_query($con, $sqlNroCliente);
                $NroClienteArray = $resultado->fetch_assoc();
                $NroCliente = implode($NroClienteArray);

                // Tabla cliente tel
                $sqlClienteTel = "INSERT INTO clientetel (NroCliente, Tel) VALUES ('$NroCliente', '$telefono')";

                // Tabla cliente empresa
                $sqlClienteEmpresa = "INSERT INTO clienteempresa (NroCliente, Nombre, RUT)
                    VALUES ('$NroCliente', '$nombre', '$rut')";

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
                header("Location: ../php/inicio-sesion.php#registrado");
            }

        }
    }catch(Exception $ex){ echo "ERROR: " . $ex->getMessage(); }
