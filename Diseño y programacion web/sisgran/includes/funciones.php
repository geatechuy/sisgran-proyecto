<?php

// Función para incluir archivos en el código HTML
// $archivo = nombre del archivo a incluir
// $css = nombre del archivo CSS a incluir
// $titulo = título de la página
// $index = indica si se incluye desde el archivo index.php
function incluirArchivo($archivo, $css, $titulo, $index){
    if($index){
        include "includes/$archivo.php";
    }else{
        include "../includes/$archivo.php";
    }
}


// Función para conectarse a la base de datos
function conexionBD(){
    // Define las variables de conexión
    $servidor = 'localhost:3310';
    $usuario = 'root';
    $contraseña = '';
    $baseDatos = 'geatech';

    // Crea la conexión con la base de datos
    $con = new mysqli($servidor, $usuario, $contraseña, $baseDatos);

    //Comprueba la conexión (descomentar solo en desarrollo, en producción no)
    // if ($con->connect_error) {
    // die("Conexión fallida: " . $con->connect_error);
    // }
    // echo "Conectado con éxito";

    return $con;
}

// Función para agregar cliente web (NO FUNCIONA HAY QUE HACERLO DESDE 0)
function agregarClienteWeb(){
    conexionBD();
    if($_POST){
        $CI = $_POST['documento'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $teléfono = $_POST['telefono'];
        $calle = $_POST['calle'];
        $puerta = $_POST['numero-puerta'];
        $numero_apartamento = $_POST['numero-apartamento'];
        $esquina = $_POST['esquina'];
        $barrio = $_POST['barrio'];
    }

    $sql = "INSERT INTO `cliente` ('Correo', `Calle` , 'Esquina' , 'NroApt' , 'NroPuerta' , 'barrio') 
            VALUES (NULL,'$correo', '$calle', '$esquina', '$numero_apartamento', '$puerta' , '$barrio')";

    $sql = "INSERT INTO `clienteweb` ('Nombre', 'Apellido' , 'CI') 
    VALUES (NULL,'$nombre', '$apellido', '$CI')";

    $sql = "INSERT INTO `clientetel` ('Tel') 
            VALUES (NULL,'$teléfono')";

    $sql = "INSERT INTO `usuarios` ('contraseña') 
            VALUES (NULL,'$contraseña')";

    if($con->query($sql) === TRUE) {
        echo "Nuevo registro realizado con éxito, se le notificara por correo cuando su cuenta quede autorizada.";
    }else{
        echo "Error: " . $sql . "</n>" . $con->error;
    }
}

// Función para agregar cliente empresa (NO FUNCIONA HAY QUE HACERLO DESDE 0)
function agregarClienteEmpresa(){
    conexionBD();
    if($_POST){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $rut = $_POST['rut'];
        $telefono = $_POST['telefono'];
        $calle = $_POST['calle'];
        $puerta = $_POST['numero-puerta'];
        $numero_apartamento = $_POST['numero-apartamento'];
        $esquina = $_POST['esquina'];
        $barrio = $_POST['barrio'];
    }
    
    $sql = "INSERT INTO `cliente` ('Correo', `Calle` , 'Esquina' , 'NroApt' , 'NroPuerta' , 'barrio') 
            VALUES (NULL,'$correo', '$calle', '$esquina', '$numero_apartamento', '$puerta' , '$barrio')";

    $sql = "INSERT INTO `clienteempresa` ('Nombre', 'RUT') 
            VALUES (NULL,'$nombre' , '$rut')";

    $sql = "INSERT INTO `clientetel` ('Tel') 
            VALUES (NULL,'$telefono')";

    $sql = "INSERT INTO `usuarios` ('contraseña') 
            VALUES (NULL,'$contraseña')";
    
    if($con->query($sql) === TRUE) {
        echo "Nuevo registro realizado con éxito, se le notificara por correo cuando su cuenta quede autorizada.";
    }
    else{
        echo "Error: " . $sql . "</n>" . $con->error;
    }

}
// Función para agregar huerta ecológica (NO FUNCIONA HAY QUE HACERLO DESDE 0)
function agregarHuerta(){
    conexionBD();
    if($_POST){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $teléfono = $_POST['teléfono'];
        $calle = $_POST['calle'];
        $puerta = $_POST['numero-puerta'];
        $esquina = $_POST['esquina'];
        $barrio = $_POST['barrio'];
    }
    
    $sql = "INSERT INTO `huerta` ('NombreHuerta', 'Calle' , 'NroPuerta' , 'Esquina' , 'Tel' , 'Correo' , 'barrio') 
            VALUES (NULL,'$nombre' , '$calle' , '$puerta' , '$esquina' , '$teléfono' , '$correo' , '$barrio')";

    $sql = "INSERT INTO `usuarios` ('contraseña') 
            VALUES (NULL,'$contraseña')";
    
    if($con->query($sql) === TRUE) {
        echo "Nuevo registro realizado con éxito, se le notificara por correo cuando su cuenta quede autorizada.";
    }
    else{
        echo "Error: " . $sql . "</n>" . $con->error;
    }
}

// Función para comprobar login 
function comprobarLogin($correo, $contraseña){
    conexionBD();
    $consulta="SELECT * FROM usuarios  WHERE correo='$correo' and contraseña='$contraseña'";
    $resultado=mysqli_query(conexionBD(), $consulta);
    $filas=mysqli_fetch_array($resultado);
    
    if(isset($filas)){
        switch($filas['id_cargo']){
            case 1:
                header("location:tienda.php");
            break;
            case 2:
                header("location:tienda.php");
            break;
            case 3:
                header("location:tienda.php");
            break;
            case 4:
                header("location:tienda.php");
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
    mysqli_close(conexionBD());
}

// Función para mostrar huertas
function mostrarHuertas(){
    conexionBD();
    $sql = "SELECT id, nombre, descripcion, precio FROM articulo";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each fila
        while($row = $result->fetch_assoc()) {
        echo "<br>"."Producto: " . $row["id"]."<br>".
        " Id: " . $row["###"]."<br>".
        " Nombre: " .$row["###"]."<br>".
        " Calle: " .$row["###"]."<br>".
        " Nro.Puertas: " .$row["###"]."<br>"."<br>";
        " Esquina: " .$row["###"]."<br>"."<br>";
        }
    }
    else{
        echo "0 resultados";
    }
}

// Función para enviar un correo electrónico a sisgran2022@gmail.com (NO FUNCIONA)
function enviarCorreo($nombre, $email, $asunto, $mensaje){
    $sisgran = 'sisgran2022@gmail.com';

    mail($sisgran, $asunto, $mensaje, "From: $nombre <$email>");
}

?>