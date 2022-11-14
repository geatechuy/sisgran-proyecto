    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Modificar cadete</title>

<?php
    include '../../../includes/conexion.php';

    $id = $_GET['id'];

    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $ci = $_POST['ci'];
        $correo = $_POST['correo'];

        $sql = "UPDATE repartidor
        SET CI = '$ci', Nombre = '$nombre', Correo= '$correo', Apellido = '$apellido'
        WHERE Correo = '$id'";
        $resultado = mysqli_query($con, $sql);
        header("location: ../administracion.php");
    }

    $sql = "SELECT * FROM repartidor WHERE Correo='$id'";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
    <form action="modificar.php?id=<?php echo $id ?>" method="POST" class="agregar-usuario">
        <h1>Modificar cadete: <?php echo $fila['Nombre'] . " " . $fila['Apellido'] ?></h1>
        <fieldset>
            <label>CI:</label>
            <input type="number" name="ci" required value="<?php echo $fila['CI'] ?>">
        </fieldset>
        <fieldset>
            <label>Correo:</label>
            <input type="email" name="correo" required value="<?php echo $fila['Correo'] ?>">
        </fieldset>
        <fieldset>
            <label>Nombre:</label>
            <input type="text" name="nombre" required value="<?php echo $fila['Nombre'] ?>">
        </fieldset>
        <fieldset>
            <label>Apellido:</label>
            <input type="text" name="apellido" required value="<?php echo $fila['Apellido'] ?>">
        </fieldset>
        <div>
            <input type="submit" value="Enviar" name="enviar" class="boton">
            <a href="../administracion.php#cadetes" name="cancelar" class="boton">Cancelar</a>
        </div>
    </form>
    <?php } ?>