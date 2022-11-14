<?php 

require '../includes/funciones.php';

    $archivo = "head";
    $css = "mis-pedidos";
    $titulo = "Sisgran - Mis pedidos";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);

    include "../includes/conexion.php";
    // Bloque de codigo para restringir acceso a la tienda a solo los usuarios registrados en el sistema
    $usuario = $_SESSION['nombre'];
    if(!isset($usuario)){
        header("Location: inicio-sesion.php");
    }

    $NroCliente = $_SESSION['NroCliente'];

    include ('../includes/carrito.php');
?>

<body id="body">
    <main>
        <div class="pedidos-autorizados tabla">
            <h2 class="titulo-tabla">Pedidos no autorizados</h2>
            <table>
                <tr>
                    <th>Orden</th>
                    <th>Metodo de pago</th>
                    <th>Hora de entrega</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
                <?php 

                    $sqlNoAutorizados = "SELECT * FROM orden WHERE NroCliente=$NroCliente && Autorizacion=0";
                    $resultadoNoAutorizados = mysqli_query($con, $sqlNoAutorizados);
                    while($fila = mysqli_fetch_assoc($resultadoNoAutorizados)){ $orden = $fila['NroOrden']; ?>
                        <tr>
                            <td><?php echo $fila['NroOrden'] ?></td>
                            <td><?php echo $fila['Met_Pago'] ?></td>
                            <td><?php echo $fila['Hora_Ent'] ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td>
                                <a class="ver-pedido" href="../includes/ver-pedido.php?id=<?php echo $orden ?>&cliente=<?php echo $NroCliente ?>">Ver pedido</a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
        </div>

        <div class="pedidos-autorizados tabla">
            <h2 class="titulo-tabla">Pedidos autorizados</h2>
            <table>
                <tr>
                    <th>Orden</th>
                    <th>Metodo de pago</th>
                    <th>Hora de entrega</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                <?php 

                    $sqlAutorizados = "SELECT * FROM orden, esta WHERE orden.NroCliente=$NroCliente && esta.NroOrden=orden.NroOrden && orden.Autorizacion=1 && esta.IdEstado!=4 && esta.IdEstado!=5 && esta.IdEstado!=6 GROUP BY orden.NroOrden";
                    $resultadoAutorizados = mysqli_query($con, $sqlAutorizados);
                    while($fila = mysqli_fetch_assoc($resultadoAutorizados)){ $orden = $fila['NroOrden'];?>
                        <tr>
                            <td><?php echo $orden ?></td>
                            <td><?php echo $fila['Met_Pago'] ?></td>
                            <td><?php echo $fila['Hora_Ent'] ?></td>
                            <td><?php echo $fila['Fecha'] ?></td>
                            <td>
                                <?php
                                    $estado = $fila['IdEstado'];
                                    switch($estado){
                                        case 1: echo "Pendiente"; break;
                                        case 2: echo "Armado"; break;
                                        case 3: echo "Ruta"; break;
                                        case 4: echo "Entregado"; break;
                                        case 5: echo "Cancelado"; break;
                                        case 6: echo "No entregado"; break;
                                        default: echo "Estado"; break;
                                    }
                                ?>
                            </td>
                            <td>
                                <a class="ver-pedido" href="../includes/ver-pedido.php?id=<?php echo $orden ?>&cliente=<?php echo $NroCliente ?>">Ver pedido</a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>
    <script src="../javascript/carrito.js"></script>
</body>

<?php
    $archivo = "footer";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>