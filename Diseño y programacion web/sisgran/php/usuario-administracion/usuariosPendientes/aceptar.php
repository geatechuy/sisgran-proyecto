<?php

include '../../../includes/conexion.php';

$id = $_GET['id'];
?>

<link rel="stylesheet" href="../../../css/globales.css">
<link rel="stylesheet" href="../cuerpo-directivo.css">
<form action="aceptar.php" method="POST" class="siguiente-estado" id="form">
    <h2>¿Está seguro que desea aceptar el usuario seleccionado?</h2>
    <div>
        <input type="hidden" name="id" value=<?php echo $id ?>>
        <input type="submit" value="Aceptar" name="aceptar" class="boton" id="button">
        <input type="submit" value="Cancelar" name="cancelar" class="boton">
    </div>
</form>


<?php

    if(isset($_POST['aceptar'])){
        $id = $_POST['id'];
        $sql = "UPDATE usuarios SET Estado = '2' WHERE id = $id";
        $resultado = mysqli_query($con, $sql);
        header("Location: notificarUsuarioAceptado.php?id=$id");
    }
    
    if(isset($_POST['cancelar'])){
        header("Location: ../administracion.php#pendientes");
    }
?>