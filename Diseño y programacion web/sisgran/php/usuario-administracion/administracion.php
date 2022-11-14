<?php 

include '../../includes/conexion.php'; 

session_start();

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
    <link rel="stylesheet" href="../../css/globales.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="administrador.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/4ac277a656.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Administrador</title>
</head>
<body>
    <div class="grid">
        <header class="grid__header">
            <a class="logo" href="#">
                <img class="logo" src="../../images/logoColorHoja.png" alt="Logo Sisgran">
            </a>
            <p class="nombre-usuario">Bienvenido a Sisgran, <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></p>
            <a href="../../includes/cerrar-sesion.php" class="boton cerrar-sesion-boton">Cerrar sesión</a>
        </header>
        <div class="grid__nav">
            <div class="info-usuario">
                <img class="icono-usuario" src="assets/icons/usuario.svg" alt="Icono de usuario">
                <p class="nombre-usuario"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></p>
            </div>
            <nav>
                <ul class="navbar">
                    <li class="navbar-item">
                        <a href="#huertas" id="huerta">
                            <img class="item-img" src="assets/icons/huerta.svg" alt="Icono de huertas">
                            <p class="item-nombre">Huertas</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#clientes" id="cliente">
                            <img class="item-img" src="assets/icons/cliente.svg" alt="Icono de clientes">
                            <p class="item-nombre">Clientes</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#empresas" id="empresa">
                            <img class="item-img" src="assets/icons/empresa.svg" alt="Icono de empresas">
                            <p class="item-nombre">Empresas</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#pendientes" id="pendiente">
                            <img class="item-img" src="assets/icons/pendiente.svg" alt="Icono de usuarios pendientes">
                            <p class="item-nombre">Pendientes</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#catalogos" id="catalogo">  
                            <img class="item-img" src="assets/icons/catalogos.svg" alt="Icono de catalogo">
                            <p class="item-nombre">Catálogo</p>
                        </a>
                    </li>

                    <li class="navbar-item">
                        <a href="#pedidos" id="pedido">
                            <img class="item-img" src="assets/icons/pedido.svg" alt="Icono de pedidos">
                            <p class="item-nombre">Pedidos</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#ventas" id="venta">
                            <img class="item-img" src="assets/icons/feria.svg" alt="Icono de ventas">
                            <p class="item-nombre">Ventas</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#cadetes" id="cadete">
                            <img class="item-img" src="assets/icons/cadete.svg" alt="Icono de repartidores">
                            <p class="item-nombre">Cadetes</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <img class="bg-img" src="assets/vegetales.jpg" alt="Imagen de vegetales">
            <div class="overlay"></div>
        </div>
        <main class="grid__main">
            <h1>CANTIDAD DE ELEMENTOS</h1>
            <div class="elementos">
                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(IdHuerta) as NroHuertas from huerta, usuarios WHERE huerta.Correo=usuarios.Correo AND usuarios.Estado=2";
                            $resultado = mysqli_query($con, $sql);
                            $NroHuertas = $resultado->fetch_assoc();
                            echo $NroHuertas['NroHuertas'];
                            ?>
                        </p>
                        <p class="info-nombre">Huertas</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/huerta.svg" alt="Icono de huertas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(clienteweb.NroCliente) as Clientes FROM clienteweb, cliente, usuarios WHERE clienteweb.NroCliente=cliente.NroCliente && cliente.Correo=usuarios.Correo && usuarios.Estado=2";
                            $resultado = mysqli_query($con, $sql);
                            $NroCliente = $resultado->fetch_assoc();
                            echo $NroCliente['Clientes'];
                            ?>
                        </p>
                        <p class="info-nombre">Clientes</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/cliente.svg" alt="Icono de clientes">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(clienteempresa.NroCliente) as Clientes FROM clienteempresa, cliente, usuarios WHERE clienteempresa.NroCliente=cliente.NroCliente && cliente.Correo=usuarios.Correo && usuarios.Estado=2";
                            $resultado = mysqli_query($con, $sql);
                            $NroCliente = $resultado->fetch_assoc();
                            echo $NroCliente['Clientes'];
                            ?>
                        </p>
                        <p class="info-nombre">Empresas</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/empresa.svg" alt="Icono de empresas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT (SELECT COUNT(*) FROM usuarios WHERE Estado=1 && id_cargo=5) + (SELECT COUNT(*) FROM usuarios WHERE Estado=0 && id_cargo=6) AS Pendientes
                            FROM DUAL";
                            $resultado = mysqli_query($con, $sql);
                            $Pendientes = $resultado->fetch_assoc();
                            echo $Pendientes['Pendientes'];
                            ?>
                        </p>
                        <p class="info-nombre">Usuarios pendientes</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/pendiente.svg" alt="Icono de pendientes">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(CI) as CI from repartidor";
                            $resultado = mysqli_query($con, $sql);
                            $Repartidores = $resultado->fetch_assoc();
                            echo $Repartidores['CI'];
                            ?>
                        </p>
                        <p class="info-nombre">Cadetes</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/cadete.svg" alt="Icono de ventas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(NroOrden) as Ventas FROM esta WHERE IdEstado=4";
                            $resultado = mysqli_query($con, $sql);
                            $Ventas = $resultado->fetch_assoc();
                            echo $Ventas['Ventas'];
                            ?>
                        </p>
                        <p class="info-nombre">Ventas</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/venta.svg" alt="Icono de ventas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->
                
                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(NroOrden) as Pedidos FROM orden WHERE Autorizacion=0";
                            $resultado = mysqli_query($con, $sql);
                            $Pedidos = $resultado->fetch_assoc();
                            echo $Pedidos['Pedidos'];
                            ?>
                        </p>
                        <p class="info-nombre">Pedidos pendientes</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/pedido.svg" alt="Icono de pedidos">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(orden.NroOrden) as Pedidos FROM orden, esta WHERE orden.Autorizacion=1 && orden.NroOrden=esta.NroOrden && esta.FechaFin IS NULL && esta.IdEstado=2";
                            $resultado = mysqli_query($con, $sql);
                            $Pedidos = $resultado->fetch_assoc();
                            echo $Pedidos['Pedidos'];
                            ?>
                        </p>
                        <p class="info-nombre">Pedidos armados</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/pedido.svg" alt="Icono de pedidos">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(orden.NroOrden) as Pedidos FROM orden, esta WHERE orden.Autorizacion=1 && orden.NroOrden=esta.NroOrden && esta.IdEstado = 3 && esta.FechaFin IS NULL";
                            $resultado = mysqli_query($con, $sql);
                            $Pedidos = $resultado->fetch_assoc();
                            echo $Pedidos['Pedidos'];
                            ?>
                        </p>
                        <p class="info-nombre">Pedidos en ruta</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/pedido.svg" alt="Icono de pedidos">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->
            
            </div>
            <div id="huertas" class="elemento_mostrado">
                <a class="boton" href="huertasABM/agregar.php">Agregar huerta</a>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Barrio</th>
                        <th>Calle</th>
                        <th>Esquina</th>
                        <th>N°Puerta</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM huerta, usuarios WHERE huerta.Correo=usuarios.Correo AND usuarios.Estado=2";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['IdHuerta'] ?></td>
                            <td><?php echo $fila['NombreHuerta'] ?></td>
                            <td><?php echo $fila['Correo'] ?></td>
                            <td><?php echo $fila['Tel'] ?></td>
                            <td><?php echo $fila['barrio'] ?></td>
                            <td><?php echo $fila['Calle'] ?></td>
                            <td><?php echo $fila['Esquina'] ?></td>
                            <td><?php echo $fila['NroPuerta'] ?></td>
                            <td>
                                <a href="huertasABM/borrar.php?id=<?php echo $fila['IdHuerta'] ?>" class="utilidadTabla"><i class="fa-solid fa-trash"></i></a>
                                <a href="huertasABM/modificar.php?id=<?php echo $fila['IdHuerta'] ?>"class="utilidadTabla"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </table>
            </div>
            <div id="clientes" class="elemento_mostrado">
                <a class="boton" href="clientesABM/agregar.php">Agregar cliente</a>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>CI</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Barrio</th>
                        <th>Calle</th>
                        <th>Esquina</th>
                        <th>Puerta</th>
                        <th>Apt</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM cliente, clientetel, clienteweb, usuarios WHERE clienteweb.NroCliente=cliente.NroCliente && clientetel.NroCliente=clienteweb.NroCliente && cliente.Correo=usuarios.Correo && usuarios.Estado = 2";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['NroCliente'] ?></td>
                            <td><?php echo $fila['CI'] ?></td>
                            <td><?php echo $fila['Correo'] ?></td>
                            <td><?php echo $fila['Tel'] ?></td>
                            <td><?php echo $fila['Nombre'] ?></td>
                            <td><?php echo $fila['Apellido'] ?></td>
                            <td><?php echo $fila['barrio'] ?></td>
                            <td><?php echo $fila['Calle'] ?></td>
                            <td><?php echo $fila['Esquina'] ?></td>
                            <td><?php echo $fila['NroPuerta'] ?></td>                                
                            <td><?php echo $fila['NroApt'] ?></td>
                            <td>
                            <a href="clientesABM/borrar.php?id=<?php echo $fila['NroCliente'] ?>" class="utilidadTabla"><i class="fa-solid fa-trash"></i></a>
                                <a href="clientesABM/modificar.php?id=<?php echo $fila['NroCliente'] ?>"class="utilidadTabla"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </table>
            </div>
            <div id="empresas" class="elemento_mostrado">
                <a class="boton" href="empresasABM/agregar.php">Agregar empresa</a>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Barrio</th>
                        <th>Calle</th>
                        <th>Esquina</th>
                        <th>Puerta</th>
                        <th>Apt</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM cliente, clientetel, clienteempresa, usuarios WHERE clienteempresa.NroCliente=cliente.NroCliente && clientetel.NroCliente=clienteempresa.NroCliente && cliente.Correo=usuarios.Correo && usuarios.Estado=2";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['NroCliente'] ?></td>
                            <td><?php echo $fila['RUT'] ?></td>
                            <td><?php echo $fila['Nombre'] ?></td>
                            <td><?php echo $fila['Correo'] ?></td>
                            <td><?php echo $fila['Tel'] ?></td>
                            <td><?php echo $fila['barrio'] ?></td>
                            <td><?php echo $fila['Calle'] ?></td>
                            <td><?php echo $fila['Esquina'] ?></td>
                            <td><?php echo $fila['NroPuerta'] ?></td>
                            <td><?php echo $fila['NroApt'] ?></td>
                            <td>
                                <a href="empresasABM/borrar.php?id=<?php echo $fila['NroCliente'] ?>" class="utilidadTabla"><i class="fa-solid fa-trash"></i></a>
                                <a href="empresasABM/modificar.php?id=<?php echo $fila['NroCliente'] ?>"class="utilidadTabla"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </table>
            </div>
            <div id="pendientes" class="elemento_mostrado">

                <!-- TABLA CLIENTES -->

                <h3 class="titulo-tabla">Clientes web</h3>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Tel</th>
                        <th>CI</th>
                        <th>Barrio</th>
                        <th>Calle</th>
                        <th>Esquina</th>
                        <th>Puerta</th>
                        <th>Apt</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM usuarios, cliente, clientetel, clienteweb WHERE usuarios.id_cargo=6 AND Estado=0 AND cliente.Correo=usuarios.Correo AND cliente.NroCliente=clientetel.NroCliente AND clienteweb.NroCliente=cliente.NroCliente";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['apellido'] ?></td>
                            <td><?php echo $fila['Correo'] ?></td>
                            <td><?php echo $fila['Tel'] ?></td>
                            <td><?php echo $fila['CI'] ?></td>
                            <td><?php echo $fila['barrio'] ?></td>
                            <td><?php echo $fila['Calle'] ?></td>
                            <td><?php echo $fila['Esquina'] ?></td>
                            <td><?php echo $fila['NroPuerta'] ?></td>
                            <td><?php echo $fila['NroApt'] ?></td>
                            <td>
                                <a href="usuariosPendientes/aceptar.php?id=<?php echo $fila['id'] ?>" class="utilidadTabla"><i class="fa-solid fa-check"></i></a>
                                <a href="usuariosPendientes/rechazar.php?id=<?php echo $fila['id'] ?>"class="utilidadTabla"><i class="fa-solid fa-x"></i></a>
                            </td> 
                        </tr>
                <?php } ?>
                </table>
                
                <!-- TABLA EMPRESAS -->

                <h3 class="titulo-tabla">Clientes empresas</h3>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Tel</th>
                        <th>RUT</th>
                        <th>Barrio</th>
                        <th>Calle</th>
                        <th>Esquina</th>
                        <th>Puerta</th>
                        <th>Apt</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM usuarios, cliente, clientetel, clienteempresa WHERE usuarios.id_cargo=6 AND Estado=0 AND cliente.Correo=usuarios.Correo AND cliente.NroCliente=clientetel.NroCliente AND clienteempresa.NroCliente=cliente.NroCliente";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['Correo'] ?></td>
                            <td><?php echo $fila['Tel'] ?></td>
                            <td><?php echo $fila['RUT'] ?></td>
                            <td><?php echo $fila['barrio'] ?></td>
                            <td><?php echo $fila['Calle'] ?></td>
                            <td><?php echo $fila['Esquina'] ?></td>
                            <td><?php echo $fila['NroPuerta'] ?></td>
                            <td><?php echo $fila['NroApt'] ?></td>
                            <td>
                                <a href="usuariosPendientes/aceptar.php?id=<?php echo $fila['id'] ?>" class="utilidadTabla"><i class="fa-solid fa-check"></i></a>
                                <a href="usuariosPendientes/rechazar.php?id=<?php echo $fila['id'] ?>"class="utilidadTabla"><i class="fa-solid fa-x"></i></a>
                            </td> 
                        </tr>
                <?php } ?>
                </table>

                <!-- TABLA HUERTAS -->

                <h3 class="titulo-tabla">Huertas</h3>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Tel</th>
                        <th>Barrio</th>
                        <th>Calle</th>
                        <th>Esquina</th>
                        <th>Puerta</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM usuarios, huerta WHERE usuarios.id_cargo=5 AND Estado=1 AND usuarios.Correo=huerta.Correo";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['NombreHuerta'] ?></td>
                            <td><?php echo $fila['Correo'] ?></td>
                            <td><?php echo $fila['Tel'] ?></td>
                            <td><?php echo $fila['barrio'] ?></td>
                            <td><?php echo $fila['Calle'] ?></td>
                            <td><?php echo $fila['Esquina'] ?></td>
                            <td><?php echo $fila['NroPuerta'] ?></td>
                            <td>
                                <a href="usuariosPendientes/aceptar.php?id=<?php echo $fila['id'] ?>" class="utilidadTabla"><i class="fa-solid fa-check"></i></a>
                                <a href="usuariosPendientes/rechazar.php?id=<?php echo $fila['id'] ?>"class="utilidadTabla"><i class="fa-solid fa-x"></i></a>
                            </td> 
                        </tr>
                <?php } ?>
                </table>
            </div>
             <div id="catalogos" class="elemento_mostrado">
                <h3 class="titulo-tabla">Catálogo actual</h3>
                <table>
                    <tr>
                        <th>Vegetal</th>
                        <th>Variedad</th>
                        <th>Stock</th>
                        <th>Unidad</th>
                        <th>Precio</th>
                    </tr>
                    <?php 
                    
                    $sql = "SELECT vegetal.IdVegetal, vegetal.Nombre, variedad.NombreVariedad, variedad.IdVariedad, variedad.IdUnidad, variedad.Precio FROM vegetal, variedad WHERE vegetal.IdVegetal=variedad.IdVegetal";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['Nombre'] ?></td>
                            <td><?php echo $fila['NombreVariedad'] ?></td>
                            <td>
                                <?php 
                                $idvariedad = $fila['IdVariedad'];
                                $sqlStock = "SELECT CantActual FROM stock WHERE IdVariedad=$idvariedad";
                                $resultadoStock = mysqli_query($con, $sqlStock);
                                $stock = $resultadoStock->fetch_assoc();
                                echo $stock['CantActual'];  
                                ?>
                            </td>
                            <td><?php
                                switch($fila['IdUnidad']){
                                    case 1: echo "Kg"; break;
                                    case 2: echo "Atado"; break;
                                    case 3: echo "Unidad"; break;
                                    default: echo "Error"; break;
                                } ?></td>
                            <td>$<?php echo $fila['Precio'] ?></td>
                        </tr>
                <?php } ?>
                </table>           
                </table>
            </div>
            <div id="pedidos" class="elemento_mostrado">
                <h3>Pedidos pendientes</h3>
                <table>
                    <tr>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Método de pago</th>
                        <th>Hora de entrega</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM orden WHERE Autorizacion=0";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){
                        $orden = $fila['NroOrden'];
                        $cliente = $fila['NroCliente'];
                        ?>
                        <tr>
                            <td><?php echo $orden ?></td>
                            <td><?php echo $cliente ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td><?php echo $fila['Met_Pago'] ?></td>
                            <td><?php echo $fila['Hora_Ent'] ?></td>
                            <td>
                                <a href="pedidosAutorizacion/aceptar.php?id=<?php echo $fila['NroOrden'] ?>" class="utilidadTabla"><i class="fa-solid fa-check"></i></a>
                                <a href="pedidosAutorizacion/rechazar.php?id=<?php echo $fila['NroOrden'] ?>" class="utilidadTabla"><i class="fa-solid fa-x"></i></a>
                                <a class="utilidadTabla" href="verPedido.php?id=<?php echo $orden ?>&cliente=<?php echo $cliente ?>&seccion=pedidos">Ver pedido</a>
                            </td> 
                        </tr>
                <?php } ?>
                </table>
                <h3>Pedidos armados</h3>
                <table>
                    <tr>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Método de pago</th>
                        <th>Hora de entrega</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM orden, esta WHERE orden.Autorizacion=1 && orden.NroOrden=esta.NroOrden && esta.FechaFin IS NULL && esta.IdEstado=2";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){
                        $orden = $fila['NroOrden'];
                        $cliente = $fila['NroCliente'];
                        ?>
                        <tr>
                            <td><?php echo $orden ?></td>
                            <td><?php echo $cliente ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td><?php echo $fila['Met_Pago'] ?></td>
                            <td><?php echo $fila['Hora_Ent'] ?></td>
                            <td><a class="utilidadTabla" href="verPedido.php?id=<?php echo $orden ?>&cliente=<?php echo $cliente ?>&seccion=pedidos">Ver pedido</a></td>
                        </tr>
                <?php } ?>
                </table>

                <h3>Pedidos en ruta</h3>
                <table>
                    <tr>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Método de pago</th>
                        <th>Hora de entrega</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM orden, esta WHERE orden.Autorizacion=1 && orden.NroOrden=esta.NroOrden && esta.IdEstado = 3 && esta.FechaFin IS NULL";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){
                        $orden = $fila['NroOrden'];
                        $cliente = $fila['NroCliente'];
                        ?>
                        <tr>
                            <td><?php echo $orden ?></td>
                            <td><?php echo $cliente ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td><?php echo $fila['Met_Pago'] ?></td>
                            <td><?php echo $fila['Hora_Ent'] ?></td>
                            <td><a class="utilidadTabla" href="verPedido.php?id=<?php echo $orden ?>&cliente=<?php echo $cliente ?>&seccion=pedidos">Ver pedido</a></td>
                        </tr>
                <?php } ?>
                </table>

                <h3>Pedidos no entregados</h3>
                <table>
                    <tr>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Método de pago</th>
                        <th>Hora de entrega</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM orden, esta WHERE orden.Autorizacion=1 && orden.NroOrden=esta.NroOrden && esta.IdEstado = 6 && esta.FechaFin IS NULL";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){
                        $orden = $fila['NroOrden'];
                        $cliente = $fila['NroCliente'];
                        ?>
                        <tr>
                            <td><?php echo $orden ?></td>
                            <td><?php echo $cliente ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td><?php echo $fila['Met_Pago'] ?></td>
                            <td><?php echo $fila['Hora_Ent'] ?></td>
                            <td>
                                <a class="boton boton-siguiente" href="pedidosNoEntregados/pasarArmado.php?orden=<?php echo $fila['NroOrden'] ?>&fechaini=<?php echo $fila['FechaIni'] ?>">Cambiar a ARMADO</a>
                                <a class="utilidadTabla" href="verPedido.php?id=<?php echo $orden ?>&cliente=<?php echo $cliente ?>&seccion=pedidos">Ver pedido</a>
                            </td>
                        </tr>
                <?php } ?>
                </table>
            </div>
            <div id="ventas" class="elemento_mostrado">
                <h3>Ventas</h3>
                <div class="botones-ventas">
                    <a href="ventas/llevarFeria.php" class="boton">Llevar productos feria</a>
                    <a href="ventas/devolverFeria.php" class="boton">Devolver productos feria</a>
                </div>
                <table>
                    <tr>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                    <?php

                    $sqlVentas = "SELECT * FROM esta, pide WHERE esta.IdEstado=4 && esta.NroOrden=pide.NroOrden GROUP BY esta.NroOrden";
                    $resultadoVentas = mysqli_query($con, $sqlVentas);

                    while($fila = mysqli_fetch_assoc($resultadoVentas)){
                        $orden = $fila['NroOrden'];
                        $cliente = $fila['NroCliente'];
                        ?>
                        <tr>
                            <td><?php echo $fila['NroOrden'] ?></td>
                            <td><?php echo $fila['NroCliente'] ?></td>
                            <td>$<?php echo $fila['PrecioTotal'] ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td>
                                <a class="utilidadTabla" href="verPedido.php?id=<?php echo $orden ?>&cliente=<?php echo $cliente ?>&seccion=ventas">Ver pedido</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div id="cadetes" class="elemento_mostrado">
                <a class="boton" href="cadetesABM/agregar.php">Agregar cadete</a>
                <table>
                    <tr>
                        <th>CI</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th></th>
                    </tr>
                <?php 
                    
                    $sql = "SELECT * FROM repartidor";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['CI'] ?></td>
                            <td><?php echo $fila['Correo'] ?></td>
                            <td><?php echo $fila['Nombre'] ?></td>
                            <td><?php echo $fila['Apellido'] ?></td>
                            <td>
                                <a href="cadetesABM/borrar.php?id=<?php echo $fila['Correo'] ?>" class="utilidadTabla"><i class="fa-solid fa-trash"></i></a>
                                <a href="cadetesABM/modificar.php?id=<?php echo $fila['Correo'] ?>"class="utilidadTabla"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </table>
            </div>
        </main>
    </div>
    <!-- <script src="../../javascript/pantallaCarga.js"></script> -->
    <script src="../../javascript/temaNavegador.js"></script>
    <script src="administracion.js"></script>
</body>
</html>