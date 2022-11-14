    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Modificar huerta</title>

<?php
    include '../../../includes/conexion.php';

    $id = $_GET['id'];

    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $barrio = $_POST['barrio'];
        $calle = $_POST['calle'];
        $esquina = $_POST['esquina'];
        $puerta = $_POST['puerta'];

        $correoAntiguo = $_POST['correoAntiguo'];

        $sqlHuerta = "UPDATE huerta
        SET NombreHuerta = '$nombre', Calle= '$calle', NroPuerta = '$puerta', Esquina= '$esquina', Tel = '$telefono', Correo= '$correo', barrio = '$barrio'
        WHERE IdHuerta = $id";

        $sqlUsuarios = "UPDATE usuarios
        SET Correo='$correo'
        WHERE Correo='$correoAntiguo'";

        $editarHuerta=$con->query($sqlHuerta);
        if($editarHuerta==true){
            echo $correoAntiguo . " - " . $correo;
            $editarUsuarios=$con->query($sqlUsuarios);
            header("location: ../administracion.php");
        }

    }

    $sql = "SELECT * FROM huerta WHERE IdHuerta=$id";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
        <form action="modificar.php?id=<?php echo $id ?>" method="POST" class="agregar-usuario">
            <h1>Modificar huerta: <?php echo $fila['NombreHuerta'] ?></h1>
            <fieldset>
                <label>Id:</label>
                <input type="number" name="id" value="<?php echo $fila['IdHuerta'] ?>" disabled>
            </fieldset>
            <fieldset>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $fila['NombreHuerta'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Correo:</label>
                <input type="email" name="correo" value="<?php echo $fila['Correo'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Telefono:</label>
                <input type="number" name="telefono" value="<?php echo $fila['Tel'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Barrio:</label>
                <input type="text" name="barrio" value="<?php echo $fila['barrio'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Calle:</label>
                <input type="text" name="calle" value="<?php echo $fila['Calle'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Esquina:</label>
                <input type="text" name="esquina" value="<?php echo $fila['Esquina'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Puerta:</label>
                <input type="number" name="puerta" value="<?php echo $fila['NroPuerta'] ?>" required>
            </fieldset>
            <div>
                <input type="hidden" name="correoAntiguo" value="<?php echo $fila['Correo'] ?>">
                <input type="submit" value="Enviar" name="enviar" class="boton">
                <a href="../administracion.php#huertas" name="cancelar" class="boton">Cancelar</a>
            </div>
        </form>
    <?php } ?>