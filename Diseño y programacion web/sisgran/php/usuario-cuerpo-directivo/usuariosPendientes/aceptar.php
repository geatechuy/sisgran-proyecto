<?php

include '../../../includes/conexion.php';

$id = $_GET['id'];

?>

<link rel="stylesheet" href="../../../css/globales.css">
<link rel="stylesheet" href="../cuerpo-directivo.css">
<form action="aceptar.php" method="POST" class="siguiente-estado">
    <h2>¿Está seguro que desea aceptar la huerta seleccionada?</h2>
    <div>
        <input type="hidden" name="id" value=<?php echo $id ?>>
        <input type="submit" value="Aceptar" name="aceptar" class="boton">
        <input type="submit" value="Cancelar" name="cancelar" class="boton">
    </div>
</form>

<?php

    if(isset($_POST['aceptar'])){
        $idHuerta = $_POST['id'];
        $sql = "UPDATE usuarios SET Estado = '1' WHERE id = $idHuerta";
        $resultado = mysqli_query($con, $sql);
        header("Location: ../cuerpo-directivo.php#validarClientes");
    }
    
    if(isset($_POST['cancelar'])){
        header("Location: ../cuerpo-directivo.php#validarClientes");
    }
?>
