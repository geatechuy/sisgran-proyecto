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
    <link rel="stylesheet" href="cuerpo-directivo.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/4ac277a656.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Cuerpo directivo</title>
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
                <img class="icono-usuario" src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de usuario">
                <p class="nombre-usuario"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></p>
            </div>
            <nav>
                <ul class="navbar">
                    <li class="navbar-item">
                        <a href="#infoHuertas" id="huertas">
                            <img class="item-img" src="../usuario-administracion/assets/icons/huerta.svg" alt="Icono de huertas">
                            <p class="item-nombre">Información huertas</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#infoPedidos" id="pedidos">
                            <img class="item-img" src="../usuario-administracion/assets/icons/pedido.svg" alt="Icono de huertas">
                            <p class="item-nombre">Información pedidos</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#validarClientes" id="clientes">
                            <img class="item-img" src="../usuario-administracion/assets/icons/cliente.svg" alt="Icono de huertas">
                            <p class="item-nombre">Validar huertas</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <img class="bg-img" src="../usuario-administracion/assets/vegetales.jpg" alt="Imagen de vegetales">
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
                        <img src="../usuario-administracion/assets/icons/huerta.svg" alt="Icono de huertas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(NroOrden) as Pedidos FROM esta WHERE FechaFin IS NULL && esta.IdEstado!=4";
                            $resultado = mysqli_query($con, $sql);
                            $Pedidos = $resultado->fetch_assoc();
                            echo $Pedidos['Pedidos'];
                            ?>
                        </p>
                        <p class="info-nombre">Pedidos</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="../usuario-administracion/assets/icons/pedido.svg" alt="Icono de pedidos">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(id) as Huertas FROM usuarios WHERE Estado=0 && id_cargo=5";
                            $resultado = mysqli_query($con, $sql);
                            $Huertas = $resultado->fetch_assoc();
                            echo $Huertas['Huertas'];
                            ?>
                        </p>
                        <p class="info-nombre">Huertas pendientes</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="../usuario-administracion/assets/icons/pendiente.svg" alt="Icono de pendiente">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

            </div>
            <div class="elemento_mostrado" id="infoHuertas">
                <h1>Información de huertas</h1>
                <div class="info-huertas">
                    <?php

                        $sqlHuertas = "SELECT * FROM huerta";
                        $resultadoHuertas = mysqli_query($con, $sqlHuertas);
                        
                        while($filas = mysqli_fetch_assoc($resultadoHuertas)){?>
                            <div class="huerta">
                                <p class="nombre">Nombre: <?php echo $filas['NombreHuerta'] ?></p>
                                <p class="nombre">Email: <?php echo $filas['Correo'] ?></p>
                                <p class="nombre">Tel: <?php echo $filas['Tel'] ?></p>
                                <p class="nombre">Dir: <?php echo $filas['barrio'] . ', ' . $filas['Calle'] . ' esq ' . $filas['Esquina'] . ' ' . $filas['NroPuerta'] ?></p>
                                <a class="boton" href="infoHuertas.php?huerta=<?php echo $filas['IdHuerta'] ?>">Ver información de la huerta</a>
                            </div>
                    <?php } ?>
                </div>
                <div class="produccion-total">
                    <h2 class="titulo-tabla">Historial de producción total</h2>
                    <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                    <?php
                    $sqlHuertasTotal = "SELECT IdHuerta, IdVegetal, IdVariedad, sum(Cantidad) AS 'Cantidad' FROM `cosecha` GROUP BY IdHuerta;";
                    $resultadoHuertasTotal = mysqli_query($con, $sqlHuertasTotal);

                    while($filas = mysqli_fetch_assoc($resultadoHuertasTotal)){?>
                        <tr>
                            <td><?php echo $filas['IdHuerta'] ?></td>
                            <td><?php
                            $idHuerta = $filas['IdHuerta'];
                            $sqlNombreHuerta = "SELECT NombreHuerta FROM huerta WHERE IdHuerta=$idHuerta";
                            $resultadoNombreHuerta = mysqli_query($con, $sqlNombreHuerta);
                            $fetch = $resultadoNombreHuerta->fetch_assoc();
                            $NombreHuerta = $fetch['NombreHuerta'];
                            echo $NombreHuerta;
                            ?>
                            </td>
                            <td><?php echo $filas['Cantidad'] ?></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
            </div>
            <div class="info-pedidos elemento_mostrado" id="infoPedidos">
                <h1>Información de pedidos</h1>
                <h3 class="titulo-tabla">Pedidos en armado</h3>
                <table>
                    <tr>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Vegetal</th>
                        <th>Variedad</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Precio</th>
                    </tr>
                    <?php 
                    $sql = "SELECT * FROM esta, pide WHERE esta.IdEstado=2 && esta.FechaFin IS NULL && pide.NroOrden=esta.NroOrden";
                    $resultado = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['NroOrden'] ?></td>
                        <td><?php echo $row['NroCliente'] ?></td>
                        <td><?php $idVegetal = $row['IdVegetal']; $sqlVegetal = "SELECT Nombre FROM vegetal WHERE IdVegetal=$idVegetal";  $resultadoVegetal = mysqli_query($con, $sqlVegetal); $vegetal=$resultadoVegetal->fetch_assoc(); echo $vegetal['Nombre']; ?></td>
                        <td><?php $idVariedad = $row['IdVariedad']; $sqlVariedad = "SELECT NombreVariedad FROM variedad WHERE IdVariedad=$idVariedad";  $resultadoVariedad = mysqli_query($con, $sqlVariedad); $variedad=$resultadoVariedad->fetch_assoc(); echo $variedad['NombreVariedad']; ?></td>
                        <td><?php echo $row['Cant'] ?></td>
                        <td><?php echo $row['Fecha'] ?></td>
                        <td><?php echo $row['PrecioTotal'] ?></td>
                    </tr>
                    <?php } ?>
                </table>

                <h3 class="titulo-tabla">Pedidos en ruta</h3>
                <table>
                    <tr>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Vegetal</th>
                        <th>Variedad</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Precio</th>
                    </tr>
                    <?php 
                    $sql = "SELECT * FROM esta, pide WHERE esta.IdEstado=3 && esta.FechaFin IS NULL && pide.NroOrden=esta.NroOrden";
                    $resultado = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['NroOrden'] ?></td>
                        <td><?php echo $row['NroCliente'] ?></td>
                        <td><?php $idVegetal = $row['IdVegetal']; $sqlVegetal = "SELECT Nombre FROM vegetal WHERE IdVegetal=$idVegetal";  $resultadoVegetal = mysqli_query($con, $sqlVegetal); $vegetal=$resultadoVegetal->fetch_assoc(); echo $vegetal['Nombre']; ?></td>
                        <td><?php $idVariedad = $row['IdVariedad']; $sqlVariedad = "SELECT NombreVariedad FROM variedad WHERE IdVariedad=$idVariedad";  $resultadoVariedad = mysqli_query($con, $sqlVariedad); $variedad=$resultadoVariedad->fetch_assoc(); echo $variedad['NombreVariedad']; ?></td>
                        <td><?php echo $row['Cant'] ?></td>
                        <td><?php echo $row['Fecha'] ?></td>
                        <td><?php echo $row['PrecioTotal'] ?></td>
                    </tr>
                    <?php } ?>
                </table>   
                
                <h3 class="titulo-tabla">Pedidos no entregados</h3>
                <table>
                    <tr>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Vegetal</th>
                        <th>Variedad</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Precio</th>
                    </tr>
                    <?php 
                    $sql = "SELECT * FROM esta, pide WHERE esta.IdEstado=6 && esta.FechaFin IS NULL && pide.NroOrden=esta.NroOrden";
                    $resultado = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['NroOrden'] ?></td>
                        <td><?php echo $row['NroCliente'] ?></td>
                        <td><?php $idVegetal = $row['IdVegetal']; $sqlVegetal = "SELECT Nombre FROM vegetal WHERE IdVegetal=$idVegetal";  $resultadoVegetal = mysqli_query($con, $sqlVegetal); $vegetal=$resultadoVegetal->fetch_assoc(); echo $vegetal['Nombre']; ?></td>
                        <td><?php $idVariedad = $row['IdVariedad']; $sqlVariedad = "SELECT NombreVariedad FROM variedad WHERE IdVariedad=$idVariedad";  $resultadoVariedad = mysqli_query($con, $sqlVariedad); $variedad=$resultadoVariedad->fetch_assoc(); echo $variedad['NombreVariedad']; ?></td>
                        <td><?php echo $row['Cant'] ?></td>
                        <td><?php echo $row['Fecha'] ?></td>
                        <td>$<?php echo $row['PrecioTotal'] ?></td>
                    </tr>
                    <?php } ?>
                </table>  
            </div>
            <div class="validar-clientes elemento_mostrado" id="validarClientes">
                <h1>Validar huertas pendientes</h1>
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
                    
                    $sql = "SELECT * FROM usuarios, huerta WHERE usuarios.id_cargo=5 AND Estado=0 AND usuarios.Correo=huerta.Correo";
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
        </main>
    </div>
    <script src="../../javascript/pantallaCarga.js"></script>
    <script src="../../javascript/temaNavegador.js"></script>
    <script src="cuerpo-directivo.js"></script>
</body>
</html>