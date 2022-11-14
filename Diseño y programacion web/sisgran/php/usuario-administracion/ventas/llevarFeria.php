<?php
    include '../../../includes/conexion.php';
    
    if(isset($_POST['enviar'])){
        $variedad = $_POST['idvariedad'];
        $cantidad = $_POST['cantidad'];

        $sql = "SELECT CantActual FROM stock WHERE IdVariedad=$variedad";
        echo $variedad;
        $resultado = mysqli_query($con, $sql);
        $fetch = $resultado->fetch_assoc();
        $CantActual = $fetch['CantActual'];
        if($CantActual<$cantidad){
            header("Location: error-cantidad.php");
            die;
        }else{
            $CantNueva = $CantActual-$cantidad;
            $sqlUpdate = "UPDATE stock SET CantActual=$CantNueva WHERE IdVariedad=$variedad";
            $resultado = mysqli_query($con, $sqlUpdate);
            if($resultado==true){
                header("Location: ../administracion.php#ventas");
            }else{
                echo "ERROR: NO SE PUDO ACTUALIZAR EL STOCK";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Llevar productos feria</title>
</head>
<body>
    <div class="grid">
        <header class="grid__header">
            <a class="logo" href="#">
                <img class="logo" src="../../../images/logoColorHoja.png" alt="Logo Sisgran">
            </a>
            <a href="../../../includes/cerrar-sesion.php" class="boton cerrar-sesion-boton">Cerrar sesión</a>
        </header>
        <main class="grid__main">
            <h1>Llevar productos feria</h1>
            <form action="llevarFeria.php" method="POST" class="feria">
                <h3>Productos en stock</h3>
                <div>
                    <select name="idvariedad">
                        <?php 
                        $sql = "SELECT * FROM stock WHERE CantActual>0";
                        $resultado = mysqli_query($con, $sql);

                        while($fila = mysqli_fetch_assoc($resultado)){
                            $idVegetal =  $fila['IdVegetal'];
                            $idVariedad =  $fila['IdVariedad'];

                            $sqlNombreVegetal = "SELECT Nombre FROM vegetal WHERE IdVegetal=$idVegetal";
                            $resultadoVegetal = mysqli_query($con, $sqlNombreVegetal);
                            $fetchVegetal = $resultadoVegetal->fetch_assoc();

                            $sqlNombreVariedad = "SELECT NombreVariedad FROM variedad WHERE IdVariedad=$idVariedad";
                            $resultadoVariedad = mysqli_query($con, $sqlNombreVariedad);
                            $fetchVariedad = $resultadoVariedad->fetch_assoc();
                            
                            ?>
                            <option value="<?php echo $fila['IdVariedad'] ?>"><?php echo $fetchVegetal['Nombre'] . ' - ' . $fetchVariedad['NombreVariedad'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" name="cantidad" placeholder="Cantidad..." required min="1">
                </div>
                <div>
                    <input type="submit" value="Llevar" name="enviar" class="boton">
                    <a href="../administracion.php#ventas" class="boton">Volver</a>
                </div>
            </form>
        </main>
    </div>
    <script src="../../javascript/pantallaCarga.js"></script>
    <script src="../../javascript/temaNavegador.js"></script>
</body>