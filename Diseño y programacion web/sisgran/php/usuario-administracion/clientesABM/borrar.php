    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Borrar cliente</title>

<?php
    include '../../../includes/conexion.php';
    $id = $_GET['id'];

    if(isset($_POST['aceptar'])){
        $sqlWeb = "DELETE FROM clienteweb WHERE NroCliente=$id";
        $sqlTel = "DELETE FROM clientetel WHERE NroCliente=$id";
        $sqlCliente = "DELETE FROM cliente WHERE NroCliente=$id";
        
        // Primer fila borrada
        $borrarClienteWeb=$con->query($sqlWeb);
        if($borrarClienteWeb==true){
            // Segunda fila borrada
            $borrarClienteTel=$con->query($sqlTel);

            if($borrarClienteTel==true){
                // Tercer fila borrada
                $borrarCliente=$con->query($sqlCliente);
                header("location: ../administracion.php");
            }
        }
    }

    $sql = "SELECT * FROM clienteweb WHERE NroCliente=$id";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
    <div class="borrar-usuario">
        <h1>Desea borrar el cliente: <?php echo $fila['Nombre'] . " " . $fila['Apellido'] ?></h1>
        <p>Id: <?php echo $fila['NroCliente'] ?></p>
        <p>Nombre: <?php echo $fila['Nombre'] ?></p>
        <p>Nombre: <?php echo $fila['Apellido'] ?></p>
        <p>RUT: <?php echo $fila['CI'] ?></p>
        
        <form action="borrar.php?id=<?php echo $id ?>" method="POST">
            <input type="submit" value="Aceptar" name="aceptar" class="boton">
            <a href="../administracion.php#clientes" name="cancelar" class="boton">Cancelar</a>
        </form>
    </div>
    <?php } ?>