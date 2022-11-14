    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../../css/globales.css">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../administrador.css">

    <link rel="shortcut icon" href="../../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Borrar empresa</title>

<?php
    include '../../../includes/conexion.php';
    $id = $_GET['id'];

    if(isset($_POST['aceptar'])){
        $sqlEmpresa = "DELETE FROM clienteempresa WHERE NroCliente=$id";
        $sqlTel = "DELETE FROM clientetel WHERE NroCliente=$id";
        $sqlCliente = "DELETE FROM cliente WHERE NroCliente=$id";
        
        // Primer fila borrada
        $borrarClienteEmpresa=$con->query($sqlEmpresa);
        if($borrarClienteEmpresa==true){
            // Segunda fila borrada
            $borrarClienteTel=$con->query($sqlTel);

            if($borrarClienteTel==true){
                // Tercer fila borrada
                $borrarCliente=$con->query($sqlCliente);
                header("location: ../administracion.php#empresas");
            }
        }
    }

    $sql = "SELECT * FROM clienteempresa WHERE NroCliente=$id";
    $resultado = mysqli_query($con, $sql);

    while($fila = mysqli_fetch_assoc($resultado)){?>
    <div class="borrar-usuario">
        <h1>Desea borrar la empresa: <?php echo $fila['Nombre'] ?></h1>
        <p>Id: <?php echo $fila['NroCliente'] ?></p>
        <p>Nombre: <?php echo $fila['Nombre'] ?></p>
        <p>RUT: <?php echo $fila['RUT'] ?></p>

        <form action="borrar.php?id=<?php echo $id ?>" method="POST">
            <input type="submit" value="Aceptar" name="aceptar" class="boton">
            <a href="../administracion.php#empresas" class="boton">Canclear</a>
        </form>
    </div>
    <?php } ?>