<link rel="stylesheet" href="../../css/globales.css">
<link rel="stylesheet" href="huerta.css">

<?php 

$idHuerta = $_GET['huerta'];
date_default_timezone_set('America/Montevideo');
include '../../includes/conexion.php';

if(isset($_POST['variedad'])){
    $cultivoBase = $_POST['cultivoBase'];
    $variedadBase = $_POST['variedadBase'];
    $cantidadBase = $_POST['cantidadBase'];

    $cultivoAsociado = $_POST['cultivoAsociado'];
    if($cultivoAsociado != 0){
        $variedadAsociado = $_POST['variedadAsociado'];
        $cantidadAsociado = $_POST['cantidadAsociado'];
    }
    $fecha = $_POST['fecha'];

    $insercionBase = "INSERT INTO produce (IdHuerta, IdVegetal, IdVariedad, Fecha, Cantidad, Estado, Estado_Post) VALUES ('$idHuerta', '$cultivoBase', '$variedadBase', '$fecha', '$cantidadBase', 'Sembrar', 1)";
    $resultado = mysqli_query($con, $insercionBase);

    if($resultado && $cultivoAsociado!=0){
        $insercionAsociado = "INSERT INTO produce (IdHuerta, IdVegetal, IdVariedad, Fecha, Cantidad, Estado, Estado_Post) VALUES ('$idHuerta', '$cultivoAsociado', '$variedadAsociado', '$fecha', '$cantidadAsociado', 'Sembrar', 1)";
        $resultado = mysqli_query($con, $insercionAsociado);
    }
    header("Location: huerta.php#estadosCultivos");
}

if(isset($_POST['enviar'])){
    $cultivoBase = $_POST['cultivoBase'];
    $cultivoAsociado = $_POST['cultivoAsociado'];
    $sql = "SELECT Nombre FROM vegetal WHERE IdVegetal = '$cultivoBase'";
    $resultado = mysqli_query($con, $sql);
    $nombreBase = $resultado->fetch_assoc();

    $sqlAsociado = "SELECT Nombre FROM vegetal WHERE IdVegetal = '$cultivoAsociado'";
    $resultado = mysqli_query($con, $sqlAsociado);
    $nombreAsociado = $resultado->fetch_assoc();
?>
<form class="seleccion-cultivo seleccionar" style="padding: 10px" action="variedad_cantidad.php?huerta=<?php echo $idHuerta ?>" method="POST">
    <fieldset>
        <label>¿Qué variedad de <?php echo $nombreBase['Nombre']; ?> desea sembrar?</label>
        <select name="variedadBase" id="variedadBase">
        <?php

        $sql = "SELECT * FROM variedad WHERE IdVegetal = '$cultivoBase'";
        $resultado = mysqli_query($con, $sql);

        while($filas = mysqli_fetch_assoc($resultado)){
            echo "<option value='" . $filas['IdVariedad'] . "'>" . $filas['NombreVariedad'] . "</option>";
        }
        ?>
        <label>Cantidad:</label>
        <input type="number" name="cantidadBase" min=1 value=1 style="width: 60px">
        </select>
    </fieldset>
    <?php if(!is_null($nombreAsociado)){ ?>
    <fieldset>
        <label>¿Qué variedad de <?php echo $nombreAsociado['Nombre'] ?> desea sembrar?</label>
        <select name="variedadAsociado" id="variedadAsociado">
        <?php

        $sql = "SELECT * FROM variedad WHERE IdVegetal = '$cultivoAsociado'";
        $resultado = mysqli_query($con, $sql);

        while($filas = mysqli_fetch_assoc($resultado)){
            echo "<option value='" . $filas['IdVariedad'] . "'>" . $filas['NombreVariedad'] . "</option>";
        }
        ?>
        <label>Cantidad:</label>
        <input type="number" name="cantidadAsociado" min=1 value=1 style="width: 60px">
        </select>
    </fieldset>
    <?php } ?>
    <input type="hidden" name="cultivoBase" value="<?php echo $cultivoBase ?>">
    <input type="hidden" name="cultivoAsociado" value="<?php echo $cultivoAsociado ?>">
    <input type="hidden" name="fecha" value="<?php echo date('Y-m-d h:i:sa') ?>">
    <input type="submit" value="Enviar" name="variedad" class="boton">   
</form>
<?php } ?>