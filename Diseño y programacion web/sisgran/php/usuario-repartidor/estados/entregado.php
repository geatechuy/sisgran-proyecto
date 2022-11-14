<link rel="stylesheet" href="../../../css/globales.css">
<link rel="stylesheet" href="../repartidor.css">


<?php

include '../../../includes/conexion.php';
date_default_timezone_set('America/Montevideo');

$ordenGET = $_GET['orden'];
$fechaIniGET = $_GET['fechaini']

?>


<form action="entregado.php" method="POST" class="estado-ruta">
    <h2>Está seguro que desea cambiar el estado de este pedido de Ruta a Entregado</h2>
    <div>
        <input type="submit" value="Cambiar" name="cambiar" class="boton">
        <input type="submit" value="Cancelar" name="cancelar" class="boton">
        <input type="hidden" name="orden" value="<?php echo $ordenGET ?>">
        <input type="hidden" name="fechaini" value="<?php echo $fechaIniGET ?>">
    </div>
</form>

<?php

if(isset($_POST['cambiar'])){
    // Fecha para el nuevo estado
    $fechaActual = date('Y-m-d h:i:sa');

    $orden = $_POST['orden'];
    $fechaini = $_POST['fechaini'];

    // Le pongo fecha fin al estado de ruta
    $sqlUpdate = "UPDATE esta SET FechaFin='$fechaActual' WHERE NroOrden='$orden' && FechaIni='$fechaini'";
    $resultado = mysqli_query($con, $sqlUpdate);
    
    // Inserto la misma orden con estado entregado y fecha fin null
    $sqlInsert = "INSERT INTO esta (NroOrden, FechaIni, IdEstado) VALUES ('$orden', '$fechaActual', '4')";
    $resultado = mysqli_query($con, $sqlInsert);

    if($resultado==true){
        header("Location: ../repartidor.php");
    }
}

if(isset($_POST['cancelar'])){
    header("Location: ../repartidor.php");
}