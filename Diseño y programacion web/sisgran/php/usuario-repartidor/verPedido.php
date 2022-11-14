<link rel="stylesheet" href="../../css/globales.css">
<link rel="stylesheet" href="repartidor.css">
<link rel="shortcut icon" href="../../images/LogoColorHoja.png" type="image/png">
<title>Sisgran - Ver pedido</title>

<?php 

    include '../../includes/conexion.php';

    $id = $_GET['orden'];
    $cliente = $_GET['cliente'];
                            
    $sqlPedido = "SELECT pide.NroOrden, pide.IdVegetal, pide.IdVariedad, pide.Fecha, pide.Cant, pide.PrecioUnitario, pide.PrecioTotal, cliente.NroCliente, clienteweb.Nombre, clienteweb.CI, Calle, Esquina, NroApt, NroPuerta, barrio
    FROM cliente, clienteweb, esta, pide
    WHERE cliente.NroCliente = $cliente AND cliente.NroCliente=pide.NroCliente AND pide.NroOrden = $id AND pide.NroOrden=esta.NroOrden AND CONVERT(FechaIni,Date) <= CURRENT_DATE AND cliente.NroCliente = clienteweb.NroCliente AND IdEstado=2 AND pide.NroOrden=esta.NroOrden
    UNION
    SELECT pide.NroOrden, pide.IdVegetal, pide.IdVariedad, pide.Fecha, pide.Cant, pide.PrecioUnitario, pide.PrecioTotal,  cliente.NroCliente, clienteempresa.Nombre, clienteempresa.RUT, Calle, Esquina, NroApt, NroPuerta, barrio
    FROM cliente, clienteempresa, esta, pide 
    WHERE cliente.NroCliente = $cliente AND cliente.NroCliente=pide.NroCliente AND pide.NroOrden = $id AND pide.NroOrden=esta.NroOrden AND CONVERT(FechaIni,Date) <= CURRENT_DATE AND cliente.NroCliente = clienteempresa.NroCliente AND IdEstado=2 AND pide.NroOrden=esta.NroOrden";
    $resultadoPedido = mysqli_query($con, $sqlPedido);
    ?>
    <div class="elemento_mostrado" style="display: flex">
        <table>
            <tr>
                <th>Orden</th>
                <th>Cliente</th>
                <th>Documento</th>
                <th>Barrio</th>
                <th>Calle</th>
                <th>Esquina</th>
                <th>Puerta</th>
                <th>Apartamento</th>
                <th>Vegetal</th>
                <th>Variedad</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Precio unitario</th>
                <th>Precio total</th>
            </tr>

        <?php
        while($pedido = mysqli_fetch_assoc($resultadoPedido)){?>
                <tr>
                    <td><?php echo $pedido['NroOrden'] ?></td>
                    <td><?php echo $pedido['Nombre'] ?></td>
                    <td><?php echo $pedido['CI'] ?></td>
                    <td><?php echo $pedido['barrio'] ?></td>
                    <td><?php echo $pedido['Calle'] ?></td>
                    <td><?php echo $pedido['Esquina'] ?></td>
                    <td><?php echo $pedido['NroPuerta'] ?></td>
                    <td><?php echo $pedido['NroApt'] ?></td>
                    <td>
                        <?php
                        $idvegetal = $pedido['IdVegetal'];
                        $sql = "SELECT Nombre FROM vegetal WHERE IdVegetal=$idvegetal";
                        $resultado = mysqli_query($con, $sql);
                        $vegetal=$resultado->fetch_assoc();
                        echo $vegetal['Nombre'];
                        ?>
                    </td>
                    <td>
                        <?php
                        $idvariedad = $pedido['IdVariedad'];
                        $sql = "SELECT NombreVariedad FROM variedad WHERE IdVariedad=$idvariedad";
                        $resultado = mysqli_query($con, $sql);
                        $variedad=$resultado->fetch_assoc();
                        echo $variedad['NombreVariedad'];
                        ?>
                    </td>
                    <td><?php echo $pedido['Fecha'] ?></td>
                    <td><?php echo $pedido['Cant'] ?></td>
                    <td><?php
                        $sql = "SELECT IdUnidad FROM variedad WHERE IdVariedad=$idvariedad";
                        $resultado = mysqli_query($con, $sql);
                        $variedad=$resultado->fetch_assoc();
                        switch($variedad['IdUnidad']){
                            case 1: echo 'Kg'; break;
                            case 2: echo 'Atado'; break;
                            case 3: echo 'Unidad'; break;
                        }
                        ?>
                    </td>
                    <td>$<?php echo $pedido['PrecioUnitario'] ?></td>
                    <td>$<?php echo $pedido['PrecioTotal'] ?></td>
                </tr>
        <?php } ?>
        </table>
        <a href="repartidor.php" class="boton">Volver</a>
    </div>