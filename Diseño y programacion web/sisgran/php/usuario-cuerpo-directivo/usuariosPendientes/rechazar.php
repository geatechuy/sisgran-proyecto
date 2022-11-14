<?php

    include '../../../includes/conexion.php';

    $id = $_GET['id'];
?>


<link rel="stylesheet" href="../../../css/globales.css">
<link rel="stylesheet" href="../cuerpo-directivo.css">
<form action="rechazar.php" method="POST" class="siguiente-estado">
    <h2>¿Está seguro que desea rechazar la huerta seleccionada?</h2>
    <div>
        <input type="hidden" name="id" value=<?php echo $id ?>>
        <input type="submit" value="Rechazar" name="rechazar" class="boton">
        <input type="submit" value="Cancelar" name="cancelar" class="boton">
    </div>
</form>


<?php

    if(isset($_POST['rechazar'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM usuarios WHERE id=$id";
        $resultado = mysqli_query($con, $sql);
        $filas = mysqli_fetch_array($resultado);
        
        if(isset($filas)){
            // Borrar fila en tabla usuarios
            $sqlUsuarios = "DELETE usuarios FROM usuarios JOIN huerta ON usuarios.Correo=huerta.Correo WHERE usuarios.id=$id";

            $UsuarioCorreo=$filas['Correo']; // Guarda el correo del usuario a borrar antes de que lo borre
            $borrarUsuario = $con->query($sqlUsuarios);

            if($borrarUsuario==true){
                // Borrar fila en tabla huerta
                $sqlHuertas = "DELETE FROM huerta WHERE Correo = '$UsuarioCorreo'";
                $borrarHuerta = $con->query($sqlHuertas);
                header("Location: notificarUsuarioRechazado.php?correo=$UsuarioCorreo");
            }else{
                echo "ERROR AL BORRAR EL USUARIO HUERTA";
            }
        }
    }
    
    if(isset($_POST['cancelar'])){
        header("Location: ../cuerpo-directivo.php#validarClientes");
    }