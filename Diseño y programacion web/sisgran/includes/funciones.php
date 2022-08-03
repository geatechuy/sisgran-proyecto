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
function conexionBD($servidor, $usuario, $contraseña, $baseDatos){
    // Crea la conexión con la base de datos
    $con = new mysqli($servidor, $usuario, $contraseña, $baseDatos);
    
    //Comprueba la conexión (descomentar solo en desarrollo, en producción no)
    //if ($con->connect_error) {
    //die("Conexión fallida: " . $con->connect_error);
    //}
    //echo "Conectado con éxito";
}

// Función para agregar cliente web
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
        $numero_apartamento = $_POST['###'];
        $esquina = $_POST['esquina'];
        $barrio = $_POST['barrio'];
    }

    $sql = "INSERT INTO `clienteweb` (`Nombre`, `Apellido`, `CI`, 'Correo', `Calle` , 'Esquina' , 'NroApt' , 'NroPuerta', 'Tel') 
            VALUES (NULL, '$nombre', '$apellido', '$CI', '$correo', '$calle', '$esquina', '$', '$puerta' , '$teléfono')";

    if($con->query($sql) === TRUE) {
        echo "Nuevo registro creado satisfactoriamente";
    }else{
        echo "Error: " . $sql . "</n>" . $con->error;
    }
}

// Función para agregar cliente empresa
function agregarClienteEmpresa(){
    conexionBD();
    if($_POST){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $rut = $_POST['rut'];
        $teléfono = $_POST['telefono'];
        $calle = $_POST['calle'];
        $puerta = $_POST['numero-puerta'];
        $numero_apartamento = $_POST['numero-apartamento'];
        $esquina = $_POST['esquina'];
        $barrio = $_POST['barrio'];
    }
    
    $sql = "INSERT INTO `clienteempresa` (`Nombre`, `RUT`,`Calle` , 'Esquina', 'NroApt', 'NroPuerta' , 'Tel' , 'Correo') 
            VALUES (NULL, '$nombre', '$rut', '$calle',  '$calle', '$esquina', '$numero_apartamento', '$puerta', '$teléfono', '$correo')";
    
    if($con->query($sql) === TRUE) {
        echo "Nuevo registro creado satisfactoriamente";
    }
    else{
        echo "Error: " . $sql . "</n>" . $con->error;
    }
}

// Función para agregar huerta ecológica
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
    
    $sql = "INSERT INTO `clientehuerta` (`NombreHuerta`, `Calle`, `NroPuerta`, `Esquina`, 'Tel') 
            VALUES (NULL, '$nombre', '$calle', '$puerta', '$esquina')";
    
    if($con->query($sql) === TRUE) {
        echo "Nuevo registro creado satisfactoriamente";
    }
    else{
        echo "Error: " . $sql . "</n>" . $con->error;
    }
}

// Función para comprobar login empresa
function comprobarLoginEmpresa(){
    conexionBD();
    $correo=$_POST['correo'];
    $contraseña=$_POST['contraseña'];

    $consulta="SELECT * FROM clienteempresa WHERE correo='correo' and contraseña='contraseña'";
    $resultado=mysqli_query($con, $consulta);

    $filas=mysqli_fetch_array($resultado);

    if ($filas['id_cargo']==1) {
        header("location:");
    }else
    if($filas['id_cargo']==2){
        header("location:");
    }else
    if($filas['id_cargo']==3){
        header("location:");
    }else
    if($filas['id_cargo']==4){
        header("location:");
    }else
    if($filas['id_cargo']==5){
        header("location:");
    }
    
    
    else {
        ?>
        <?php
        include("inicio-sesion.php");
        ?>
        <h3 class="error_loguin"> Error Usuario o Contraseña incorrecto </h3>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($con);
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

// Función para enviar un correo electrónico a sisgran2022@gmail.com
function enviarCorreo($nombre, $email, $asunto, $mensaje){ // NO FUNCIONA TODAVÍA
    $sisgran = 'sisgran2022@gmail.com';

    mail($sisgran, $asunto, $mensaje, "From: $nombre <$email>");
}

?>