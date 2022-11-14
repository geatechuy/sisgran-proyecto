<link rel="stylesheet" href="../css/globales.css">
<link rel="stylesheet" href="../css/mis-pedidos.css">

<?php 

    include 'conexion.php';

    $id = $_GET['id'];
    $cliente = $_GET['cliente'];
                            
    $sqlPedido = "SELECT * FROM pide WHERE NroOrden=$id AND NroCliente=$cliente";
    $resultadoPedido = mysqli_query($con, $sqlPedido);
    ?>
    <title>Sisgran - Pedido nº <?php echo $id ?></title>
    <div class="tabla">
        <table>
            <tr>
                <th>Vegetal</th>
                <th>Variedad</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Precio total</th>
            </tr>

        <?php
        while($pedido = mysqli_fetch_assoc($resultadoPedido)){?>
                <tr>
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
                    <td>$<?php echo $pedido['PrecioUnitario'] ?></td>
                    <td>$<?php echo $pedido['PrecioTotal'] ?></td>
                </tr>
        <?php } ?>
        </table>
            <a href="../php/mis-pedidos.php" class="boton">Volver</a>
    </div>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>