<?php

// Función para incluir archivos en el código HTML
function incluirArchivo($archivo, $css, $titulo, $index){
    // $archivo = nombre del archivo a incluir
    // $css = nombre del archivo CSS a incluir
    // $titulo = título de la página
    // $index = indica si se incluye desde el archivo index.php
    if($index){
        include "includes/$archivo.php";
    }else{
        include "../includes/$archivo.php";
    }
}

// Función para comprobar login 
function comprobarLogin($correo, $contraseña){
    include "conexion.php";

    $sql = "SELECT * FROM usuarios WHERE correo='$correo' and contraseña='$contraseña'";
    $resultado = mysqli_query($con, $sql);
    $filas = mysqli_fetch_array($resultado);

    if(isset($filas)){
        switch($filas['id_cargo']){
            case 1:
                header("location: tienda.php");
            break;
            case 2:
                header("location: usuario-administracion/administracion.php");
            break;
            case 3:
                header("location: usuario-cuerpo-directivo/cuerpo-directivo.php");
            break;
            case 4:
                header("location: usuario-huerta/huerta.php");
            break;
            case 5:
                header("location: usuario-repartidor/repartidor.php");
            break;
            default:
                ?> <h3 class="error_login">Error al inicar sesión</h3> <?php
            break;
        }
    }
    else{
        ?>
            <div class="error-login">
                <h3 class="error-login__texto">Error: Usuario o contraseña incorrecto</h3> 
                <i id="cerrar-login" class="fa-solid fa-xmark error-login__cerrar"></i>
            </div>
            <div class="overlay"></div>
            <script>
                document.getElementById('cerrar-login').addEventListener('click', function(){
                    document.querySelector('.error-login').style.display = 'none';
                    document.querySelector('.overlay').style.display = 'none';
                });
            </script>

        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($con);
}

// Función para mostrar huertas
function mostrarHuertas(){
    include "conexion.php";

    $sql = "SELECT * FROM huerta";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each fila
        while($row = $result->fetch_assoc()) {
        echo "Huerta: " . $row['IdHuerta']."<br>".
        "Nombre: " .$row['NombreHuerta']."<br>".
        "Calle: " .$row['Calle']."<br>".
        "Nro.Puerta: " .$row['NroPuerta']."<br>".
        "Esquina: " .$row['Esquina']."<br>".
        "Barrio: " .$row['barrio']."<br>".
        "Telefono: " .$row['Tel']."<br>".
        "Correo: " .$row['Correo']."<br><br>";
        }
    }
    else{
        echo "No hay huertas para mostrar.";
    }
}

// Función para enviar un correo electrónico a sisgran2022@gmail.com (NO FUNCIONA)
function enviarCorreo($nombre, $email, $asunto, $mensaje){
    $sisgran = 'sisgran2022@gmail.com';

    mail($sisgran, $asunto, $mensaje, "From: $nombre <$email>");
}

?>