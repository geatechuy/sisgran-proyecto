    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../informatico.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Modificar administrador</title>

<?php
    include '../../../includes/conexion.php';

    $id = $_GET['id'];

    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];

        $sql = "UPDATE usuarios
        SET nombre = '$nombre', apellido= '$apellido', correo = '$correo'
        WHERE id = $id";
        $resultado = mysqli_query($con, $sql);

        if($resultado==true){
            header("location: ../informatico.php#administradores");
        }

    }

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
        <form action="administradores.php?id=<?php echo $id ?>" method="POST" class="agregar-usuario">
            <h1>Modificar administdor/ora: <?php echo $fila['nombre'] . " " . $fila['apellido'] ?></h1>
            <fieldset>
                <label>Id:</label>
                <input type="number" name="id" value="<?php echo $fila['id'] ?>" disabled>
            </fieldset>
            <fieldset>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $fila['nombre'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Apellido:</label>
                <input type="text" name="apellido" value="<?php echo $fila['apellido'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Correo:</label>
                <input type="email" name="correo" value="<?php echo $fila['Correo'] ?>" required>
            </fieldset>
            <div>
                <input type="submit" value="Enviar" name="enviar" class="boton">
                <a href="../informatico.php#administradores" name="cancelar" class="boton">Cancelar</a>
            </div>
        </form>
    <?php } ?>