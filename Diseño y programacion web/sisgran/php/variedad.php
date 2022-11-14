<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/globales.css">
    <link rel="stylesheet" href="../css/variedad.css">
    <title>Comprar producto</title>
</head>
<body>
    <div class="producto">
        <?php

        include '../includes/conexion.php';

        $id = $_GET['id'];

        $sql = "SELECT Nombre FROM vegetal WHERE IdVegetal=$id";
        $resultado = mysqli_query($con, $sql);
        $img = $resultado->fetch_assoc();
        ?>
        <h2>Seleccione una variedad</h2>
        <img class="imgProducto" src="../images/productos/<?php echo $img['Nombre'] ?>.png" alt="<?php echo $img['Nombre'] ?>">
        <div class="infoProducto">
        <?php

        $sql = "SELECT * FROM variedad WHERE IdVegetal=$id";
        $resultado = mysqli_query($con, $sql);

        while ($fila = mysqli_fetch_assoc($resultado)){?>
            <a class="botonProducto" href="tienda.php#<?php echo $id ?>?vegetal=<?php echo $fila['IdVegetal'] ?>?variedad=<?php echo $fila['IdVariedad'] ?>">
                <p class="nombreProducto"><?php echo $fila['NombreVariedad'] ?></p>
                <p class="precioProducto">$<?php echo $fila['Precio'] ?></p>
            </a>
        
        <?php } ?>
        </div>
    </div>
    <a href="../php/tienda.php#<?php echo $id ?>" class="boton">Volver a la tienda</a>
</body>
</html>
