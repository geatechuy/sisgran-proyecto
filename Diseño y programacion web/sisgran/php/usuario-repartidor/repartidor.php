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
    <link rel="stylesheet" href="repartidor.css">

    <link rel="shortcut icon" href="../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Repartidor</title>
</head>
<body>
    <div class="grid">
        <header class="grid__header">
            <a class="logo" href="#">
                <img class="logo" src="../../images/logoColorHoja.png" alt="Logo Sisgran">
            </a>
            <a href="../../includes/cerrar-sesion.php" class="boton cerrar-sesion-boton">Cerrar sesión</a>
        </header>
    </div>
    <div class="grid__main">
        <div class="elemento_mostrado">
            <h1>PEDIDOS EN ARMADO</h1>
            <table>
                <tr>
                    <th>Orden</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Método</th>
                    <th>Entrega</th>
                    <th></th>
                </tr>
                <?php 

                    include '../../includes/conexion.php'; 

                    session_start();

                    $sql = "SELECT * FROM orden, esta WHERE orden.Autorizacion=1 && orden.NroOrden=esta.NroOrden && esta.IdEstado = 2 && esta.FechaFin IS NULL";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['NroOrden'] ?></td>
                            <td><?php echo $fila['NroCliente'] ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td><?php echo $fila['Met_Pago'] ?></td>
                            <td><?php echo $fila['Hora_Ent'] ?></td>
                            <td>
                                <a class="boton boton-siguiente" href="estados/ruta.php?orden=<?php echo $fila['NroOrden'] ?>&fechaini=<?php echo $fila['FechaIni'] ?>">Cambiar a RUTA</a>
                                <a class="boton boton-ver boton-siguiente" href="verPedido.php?orden=<?php echo $fila['NroOrden'] ?>&cliente=<?php echo $fila['NroCliente'] ?>">Ver pedido</a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
        </div>
        <div class="elemento_mostrado">
            <h1>PEDIDOS EN RUTA</h1>
            <table>
                <tr>
                    <th>Orden</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Método</th>
                    <th>Entrega</th>
                    <th></th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM orden, esta WHERE orden.Autorizacion=1 && orden.NroOrden=esta.NroOrden && esta.IdEstado = 3 && esta.FechaFin IS NULL";
                    $resultado = mysqli_query($con, $sql);

                    while($fila = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $fila['NroOrden'] ?></td>
                            <td><?php echo $fila['NroCliente'] ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td><?php echo $fila['Met_Pago'] ?></td>
                            <td><?php echo $fila['Hora_Ent'] ?></td>
                            <td>
                            <a class="boton boton-siguiente" href="estados/entregado.php?orden=<?php echo $fila['NroOrden'] ?>&fechaini=<?php echo $fila['FechaIni'] ?>">Cambiar a ENTREGADO</a>
                            <a class="boton boton-siguiente boton-no-entregado" href="estados/noEntregado.php?orden=<?php echo $fila['NroOrden'] ?>&fechaini=<?php echo $fila['FechaIni'] ?>">Cambiar a NO ENTREGADO</a>
                            <a class="boton boton-ver boton-siguiente" href="verPedido.php?orden=<?php echo $fila['NroOrden'] ?>&cliente=<?php echo $fila['NroCliente'] ?>">Ver pedido</a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>