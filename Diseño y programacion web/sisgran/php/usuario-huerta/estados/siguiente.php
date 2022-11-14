<link rel="stylesheet" href="../../../css/globales.css">
<link rel="stylesheet" href="../huerta.css">


<?php

include '../../../includes/conexion.php';
date_default_timezone_set('America/Montevideo');

$huertaGET = $_GET['huerta'];
$vegetalGET = $_GET['vegetal'];
$variedadGET = $_GET['variedad'];
$cantidadGET = $_GET['cant'];
$estadoGET = $_GET['estado'];
$fechaGET = $_GET['fecha'];

?>
    <form action="siguiente.php" method="POST" class="siguiente-estado">
        <h2>¿Está seguro que desea cambiar el estado de su cultivo de <?php echo $estadoGET ?> a <?php
        switch($estadoGET){
            case 'Sembrar': echo 'Germinar'; break;
            case 'Germinar': echo 'Trasplantar'; break;
            case 'Trasplantar': echo 'Cosechar'; break;
            case 'Cosechar': echo 'Cosechado'; break;
        }?>?</h2>
        <?php if($estadoGET=='Cosechar'){ ?>
            <div>
                <label>Cantidad cosechada: </label>
                <input type="number" value="<?php echo $cantidadGET ?>" min="0" placeholder="Cantidad" name="cantidadCosecha" required>
            </div>
        <?php } ?>
        <div>
            <input type="submit" value="Cambiar" name="cambiar" class="boton">
            <input type="submit" value="Cancelar" name="cancelar" class="boton">
            <input type="hidden" name="huerta" value="<?php echo $huertaGET ?>">
            <input type="hidden" name="vegetal" value="<?php echo $vegetalGET ?>">
            <input type="hidden" name="variedad" value="<?php echo $variedadGET ?>">
            <input type="hidden" name="cantidad" value="<?php echo $cantidadGET ?>">
            <input type="hidden" name="estado" value="<?php echo $estadoGET ?>">
            <input type="hidden" name="fecha" value="<?php echo $fechaGET ?>">
        </div>
    </form>

<?php

if(isset($_POST['cambiar'])){
    // Fecha para el nuevo estado
    $fechaActual = date('Y-m-d h:i:sa');

    $huerta = $_POST['huerta'];
    $vegetal = $_POST['vegetal'];
    $variedad = $_POST['variedad'];
    $cantidad = $_POST['cantidad'];
    $cantidadCosecha = $_POST['cantidadCosecha'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];

    // Traigo IdVegetal e IdVariedad
    $sqlSelect = "SELECT vegetal.IdVegetal, IdVariedad FROM vegetal INNER JOIN variedad ON vegetal.IdVegetal = variedad.IdVegetal && vegetal.Nombre='$vegetal' && variedad.NombreVariedad='$variedad'"; // Consulta por si se repiten nombres de variedades
    $resultado = mysqli_query($con, $sqlSelect);
    $ids = mysqli_fetch_assoc($resultado);
    $idVegetal = $ids['IdVegetal'];
    $idVariedad = $ids['IdVariedad'];


    // Edito el cultivo seleccionado para que siga en la BD pero no se muestre en la tabla
    $sqlUpdate = "UPDATE produce SET Estado_Post=0 WHERE IdHuerta='$huerta' AND IdVegetal='$idVegetal' AND IdVariedad='$idVariedad' AND Cantidad='$cantidad' AND Fecha='$fecha'";
    $resultado = mysqli_query($con, $sqlUpdate);

    // Inserto el cultivo con los mismos datos y el estado anterior
    switch($estado){
        case 'Sembrar':
            $sqlInsert = "INSERT INTO produce (IdHuerta, IdVegetal, IdVariedad, Fecha, Cantidad, Estado, Estado_Post) VALUES ('$huerta', '$idVegetal', '$idVariedad', '$fechaActual', '$cantidad', 'Germinar', '1')";
            $resultado = mysqli_query($con, $sqlInsert);
        break;
        case 'Germinar':
            $sqlInsert = "INSERT INTO produce (IdHuerta, IdVegetal, IdVariedad, Fecha, Cantidad, Estado, Estado_Post) VALUES ('$huerta', '$idVegetal', '$idVariedad', '$fechaActual', '$cantidad', 'Trasplantar', '1')";
            $resultado = mysqli_query($con, $sqlInsert);
        break;
        case 'Trasplantar':
            $sqlInsert = "INSERT INTO produce (IdHuerta, IdVegetal, IdVariedad, Fecha, Cantidad, Estado, Estado_Post) VALUES ('$huerta', '$idVegetal', '$idVariedad', '$fechaActual', '$cantidad', 'Cosechar', '1')";
            $resultado = mysqli_query($con, $sqlInsert);
            break;
        case 'Cosechar':
            $sqlSelect = "SELECT IdUnidad FROM variedad WHERE IdVegetal=$idVegetal && IdVariedad=$idVariedad";
            $resultadoSelect = mysqli_query($con, $sqlSelect);
            $unidadFetch = mysqli_fetch_assoc($resultadoSelect);
            $unidad = $unidadFetch['IdUnidad'];

            $sqlInsert = "INSERT INTO cosecha (IdHuerta, IdVegetal, IdVariedad, Cantidad, Unidad, Fecha) VALUES ('$huerta', '$idVegetal', '$idVariedad', '$cantidadCosecha', '$unidad', '$fechaActual')";
            $resultado = mysqli_query($con, $sqlInsert);

            $sqlSelectStock = "SELECT CantActual FROM stock WHERE IdVegetal=$idVegetal && IdVariedad=$idVariedad";
            $resultadoSelectStock = mysqli_query($con, $sqlSelectStock);
            $SelectStock = $resultadoSelectStock->fetch_assoc();
            $CantidadActual = $SelectStock['CantActual'];
            $CantidadStock = $CantidadActual + $cantidadCosecha;

            $sqlUpdateStock = "UPDATE stock SET CantActual=$CantidadStock WHERE IdVegetal=$idVegetal && IdVariedad=$idVariedad";
            $resultadoUpdateStock = mysqli_query($con, $sqlUpdateStock);

        break;
    }

    if($resultado==true){
        header("Location: ../huerta.php#estadosCultivos");
    }
}

if(isset($_POST['cancelar'])){
    header("Location: ../huerta.php#estadosCultivos");
}