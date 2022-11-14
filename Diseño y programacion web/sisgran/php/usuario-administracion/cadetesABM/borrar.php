    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Borrar cadete</title>

<?php
    include '../../../includes/conexion.php';
    $id = $_GET['id'];

    if(isset($_POST['aceptar'])){
        $sqlRepartidor = "DELETE FROM repartidor WHERE Correo='$id'";
        $borrarRepartidor = $con->query($sqlRepartidor);

        if($borrarRepartidor==true){
            $sqlUsuario = "DELETE FROM usuarios WHERE Correo='$id'";
            $borrarUsuario = $con->query($sqlUsuario);
            header("location: ../administracion.php#cadetes");
        }
    }

    $sql = "SELECT * FROM repartidor WHERE Correo='$id'";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
        <div class="borrar-usuario">
            <h1>Desea borrar al repartidor: <?php echo $fila['Nombre'] . " " . $fila['Apellido'] ?></h1>
            <p>CI: <?php echo $fila['CI'] ?></p>
            <p>Nombre: <?php echo $fila['Nombre'] ?></p>
            <p>Apellido: <?php echo $fila['Apellido'] ?></p>
            <p>Correo: <?php echo $fila['Correo'] ?></p>

            <form action="borrar.php?id=<?php echo $id ?>" method="POST">
                <input type="submit" value="Aceptar" name="aceptar" class="boton">
                <a href="../administracion.php#cadetes" name="cancelar" class="boton">Cancelar</a>
            </form>
        </div>
    <?php } ?>