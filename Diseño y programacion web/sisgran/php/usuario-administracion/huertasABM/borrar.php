    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Borrar huerta</title>

<?php
    include '../../../includes/conexion.php';
    $id = $_GET['id'];

    if(isset($_POST['aceptar'])){
        $sql = "DELETE FROM huerta WHERE IdHuerta=$id";
        $resultado = mysqli_query($con, $sql);

        if($resultado==true){
            $correo = $_GET['correo'];
            $sql = "DELETE FROM usuarios WHERE Correo='$correo'";
            $resultado = mysqli_query($con, $sql);
            header("location: ../administracion.php");
        }
    }

    $sql = "SELECT * FROM huerta WHERE IdHuerta=$id";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
    <div class="borrar-usuario">
        <h1>Desea borrar la huerta: <?php echo $fila['NombreHuerta'] ?></h1>
        <p>Id: <?php echo $fila['IdHuerta'] ?></p>
        <p>Nombre: <?php echo $fila['NombreHuerta'] ?></p>
        <p>Correo: <?php $correo = $fila['Correo']; echo $correo ?></p>
        <p>Telefono: <?php echo $fila['Tel'] ?></p>
        <p>Barrio: <?php echo $fila['barrio'] ?></p>
        <p>Calle: <?php echo $fila['Calle'] ?></p>
        <p>Esquina: <?php echo $fila['Esquina'] ?></p>
        <p>Puerta: <?php echo $fila['NroPuerta'] ?></p>

        <form action="borrar.php?id=<?php echo $id ?>&correo=<?php echo $correo ?>" method="POST">
            <input type="submit" value="Aceptar" name="aceptar" class="boton">
            <a href="../administracion.php#huertas" name="cancelar" class="boton">Cancelar</a>
        </form>
    </div>
    <?php } ?>