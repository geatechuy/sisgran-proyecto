<link rel="stylesheet" href="../../css/globales.css">
<link rel="stylesheet" href="administrador.css">

<?php 

    include '../../includes/conexion.php';

    $id = $_GET['id'];
    $cliente = $_GET['cliente'];
    $seccion = $_GET['seccion'];
                            
    $sqlPedido = "SELECT * FROM pide WHERE NroOrden=$id AND NroCliente=$cliente";
    $resultadoPedido = mysqli_query($con, $sqlPedido);
    ?>
    <div class="elemento_mostrado" style="display: flex">
        <table>
            <tr>
                <th>Orden</th>
                <th>Cliente</th>
                <th>Vegetal</th>
                <th>Variedad</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Precio total</th>
            </tr>

        <?php
        while($pedido = mysqli_fetch_assoc($resultadoPedido)){?>
                <tr>
                    <td><?php echo $pedido['NroOrden'] ?></td>
                    <td><?php echo $pedido['NroCliente'] ?></td>
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
                    <td>$<?php echo $pedido['PrecioTotal'] ?></td>
                </tr>
        <?php } ?>
        </table>
        <?php if($seccion=='ventas'){ ?>
            <a href="administracion.php#ventas" class="boton">Volver</a>
        <?php } else{ ?>
            <a href="administracion.php#pedidos" class="boton">Volver</a>
        <?php } ?> 
    </div>