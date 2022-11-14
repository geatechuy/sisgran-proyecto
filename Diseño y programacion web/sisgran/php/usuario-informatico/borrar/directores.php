    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../informatico.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Borrar director</title>

<?php
    include '../../../includes/conexion.php';
    $id = $_GET['id'];

    if(isset($_POST['aceptar'])){
        $sql = "DELETE FROM usuarios WHERE id=$id";
        $resultado = mysqli_query($con, $sql);
        header("location: ../informatico.php#directores");
    }

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
    <div class="borrar-usuario">
        <h1>Desea borrar al director/ora: <?php echo $fila['nombre'] . " " . $fila['apellido'] ?></h1>
        <p>Id: <?php echo $fila['id'] ?></p>
        <p>Nombre: <?php echo $fila['nombre'] ?></p>
        <p>Apellido: <?php echo $fila['apellido'] ?></p>
        <p>Correo: <?php $correo = $fila['Correo']; echo $correo ?></p>

        <form action="directores.php?id=<?php echo $id ?>" method="POST">
            <input type="submit" value="Aceptar" name="aceptar" class="boton">
            <a href="../informatico.php#directores" name="cancelar" class="boton">Cancelar</a>
        </form>
    </div>
    <?php } ?>