    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Modificar cliente</title>

<?php
    include '../../../includes/conexion.php';

    $id = $_GET['id'];

    if(isset($_POST['enviar'])){
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $ci = $_POST['ci'];
        $barrio = $_POST['barrio'];
        $calle = $_POST['calle'];
        $esquina = $_POST['esquina'];
        $puerta = $_POST['puerta'];
        $apartamento = $_POST['apartamento'];

        $sqlWeb = "UPDATE clienteweb
        SET Nombre = '$nombre', Apellido = '$apellido', CI = '$ci'
        WHERE NroCliente = $id";
        $sqlClienteTel = "UPDATE clientetel
        SET Tel = '$telefono'
        WHERE NroCliente = $id";
        $sqlCliente = "UPDATE cliente
        SET Correo = '$correo', Calle = '$calle', Esquina = '$esquina', NroApt = '$apartamento', NroPuerta = '$puerta', barrio = '$barrio'
        WHERE NroCliente = $id";

        // Primer fila editada
        $editarWeb=$con->query($sqlWeb);
        if($editarWeb==true){
            // Segunda fila editada
            $editarClienteTel=$con->query($sqlClienteTel);

            if($editarClienteTel==true){
                // Tercer fila editada
                $editarCliente=$con->query($sqlCliente);
                header("location: ../administracion.php");
            }
        }
    }

    $sql = "SELECT * FROM cliente, clientetel, clienteweb WHERE cliente.NroCliente=$id && clientetel.NroCliente=$id && clienteweb.NroCliente=$id";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
        <form action="modificar.php?id=<?php echo $id ?>" method="POST" class="agregar-usuario">
            <h1>Modificar cliente: <?php echo $fila['Nombre'] . " " . $fila['Apellido'] ?></h1>
            <fieldset>
                <label>Id:</label>
                <input type="number" name="id" value="<?php echo $fila['NroCliente'] ?>" disabled>
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
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $fila['Nombre'] ?>" required>
            </fieldset>
            <fieldset>
                <label>Apellido:</label>
                <input type="text" name="apellido" value="<?php echo $fila['Apellido'] ?>" required>
            </fieldset>
            <fieldset>
                <label>CI:</label>
                <input type="number" name="ci" value="<?php echo $fila['CI'] ?>" required>
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
            <fieldset>
                <label>Apartamento:</label>
                <input type="text" name="apartamento" value="<?php echo $fila['NroApt'] ?>" required>
            </fieldset>
            <div>
                <input type="submit" value="Enviar" name="enviar" class="boton">
                <a href="../administracion.php#clientes" name="cancelar" class="boton">Cancelar</a>
            </div>
        </form>
    <?php } ?>