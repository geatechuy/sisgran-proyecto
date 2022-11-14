<?php
    $correo=$_POST['correo'];
    $contraseña = md5($_POST['contraseña']);
    session_start();
    $_SESSION['correo']=$correo;

    include 'conexion.php';

    $sql = "SELECT * FROM usuarios WHERE correo='$correo' and contraseña='$contraseña'";
    $resultado = mysqli_query($con, $sql);
    $filas = mysqli_fetch_array($resultado);

    if(isset($filas['nombre'])){
        $nombreUsuario= $filas['nombre'];
        $apellidoUsuario= $filas['apellido'];
        $_SESSION['nombre']=$nombreUsuario;
        $_SESSION['apellido']=$apellidoUsuario;
    }

    if(isset($filas['Estado']) && $filas['Estado'] == 0 || $filas['Estado'] == 1){
        header("Location: ../php/pendiente.php");
    }
    else{
        if(isset($filas)){
            switch($filas['id_cargo']){
                case 1:
                    header("location: ../php/usuario-informatico/informatico.php");
                break;
                case 2:
                    header("location: ../php/usuario-cuerpo-directivo/cuerpo-directivo.php");
                break;
                case 3:
                    header("location: ../php/usuario-administracion/administracion.php");
                break;
                case 4:
                    header("location: ../php/usuario-repartidor/repartidor.php");
                break;
                case 5:
                    $sql = "SELECT IdHuerta, NombreHuerta from huerta WHERE Correo='$correo'";
                    $resultado = mysqli_query($con, $sql);
                    $idHuerta = -1;
                    while($fila = mysqli_fetch_assoc($resultado)){
                        $idHuerta = $fila['IdHuerta'];
                        $nombreHuerta = $fila['NombreHuerta'];
                    }
                    $_SESSION['IdHuerta'] = $idHuerta;
                    $_SESSION['NombreHuerta'] = $nombreHuerta;
                    header("location: ../php/usuario-huerta/huerta.php");
                break;
                case 6:
                    $sql = "SELECT NroCliente FROM Cliente WHERE Correo='$correo'";
                    $resultado = mysqli_query($con, $sql);
                    $NroCliente = -1;
                    while($fila = mysqli_fetch_assoc($resultado)){
                        $NroCliente = $fila['NroCliente'];
                    }
                    $_SESSION['NroCliente'] = $NroCliente;
                    header("location: ../php/tienda.php");
                break;
                default:
                    ?> <h3 class="error_login">Error al inicar sesión</h3> <?php
                break;
            }
        }
        else{
            header("location: ../php/errorlogin.php");
        ?>
<!--             <div class="error-login">
                <h3 class="error-login__texto">Error: Usuario o contraseña incorrecto</h3> 
                <i id="cerrar-login" class="fa-solid fa-xmark error-login__cerrar"></i>
            </div>
            <div class="overlay"></div>
            <script>
                document.getElementById('cerrar-login').addEventListener('click', function(){
                    document.querySelector('.error-login').style.display = 'none';
                    document.querySelector('.overlay').style.display = 'none';
                });
            </script> -->
        <?php
        }
    }
    mysqli_free_result($resultado);
    mysqli_close($con);