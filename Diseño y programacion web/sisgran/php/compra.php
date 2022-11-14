<link rel="stylesheet" href="../css/globales.css">
<link rel="stylesheet" href="../css/compra.css">
<title>Sisgran - Compra</title>
<?php

    include ('../includes/conexion.php');
    date_default_timezone_set('America/Montevideo');

    function obtenerVariedades($con){
        for($i = 0; $i<count($_POST['variedad']); $i++){
            $variedad[$i] = $_POST['variedad'][$i];
            $sql = "SELECT * FROM variedad, vegetal WHERE variedad.IdVariedad=$variedad[$i] AND vegetal.IdVegetal=variedad.IdVegetal";
            $resultado = mysqli_query($con, $sql);

            while($filas = mysqli_fetch_assoc($resultado)){
                    echo "<fieldset>";
                echo "<input type='hidden' name='idvegetal[" . $i . "]' value='" . $filas['IdVegetal'] . "'>";
                echo "<input type='hidden' name='idvariedad[" . $i . "]' value='" . $filas['IdVariedad'] . "'>";
                echo "<label>Nombre: " . $filas['Nombre'] . ", " . $filas['NombreVariedad'] . "</label>";
                echo "<input type='number' value='1' min='1' name='cantidad[" . $i . "]' required>";
                // echo "<label>" . obtenerUnidad($filas['IdUnidad']) . "</label>";
                echo "<label>$" . $filas['Precio'] . " por cada " . obtenerUnidad($filas['IdUnidad']) .  "</label>";
                echo "<input type='hidden' name='precio[" . $i . "]' value='" . $filas['Precio'] ."'>";
                echo "</fieldset>";
            }
        }  
    }

    function obtenerUnidad($id){
        $unidad = '';
        switch($id){
            case 1:
                $unidad = "Kg";
            break;
            case 2:
                $unidad = "Atado";
            break;
            case 3:
                $unidad = "Unidad";
            break;
        }
        return $unidad;
    }

    if(isset($_GET['comprar'])){
        session_start();
        $NroCliente = $_SESSION['NroCliente'];

        ?> 
        <div id="page_pdf">
            <table id="factura_head">
                <tr>
                    <td class="logo_factura">
                        <div>
                            <img src="../images/logoColor.png" style="width: 100%;">
                        </div>
                    </td>
                    <td class="info_empresa">
                        <div>
                            <span class="h2" >Sistema de Ventas</span>
                            <span class="h2" style="font-weight: bold; color: var(--verdeClaro);" >GEATECH</span>
                            <!-- <p>Teléfono de contacto: +(502) 2222-3333</p> -->
                            <p>Email de contacto: sisgran2022@gmail.com</p>
                        </div>
                    </td>
                    <td class="info_factura">
                        <?php 
                        
                        // Obtengo los datos para crear el insert
                        $fecha = $_GET['fecha'];
                        $metodo = $_GET['metodo'];
                        $entrega = $_GET['entrega'];

                        // Crea una orden en la BD
                        $sqlOrden = "INSERT INTO orden (NroCliente, Fecha, Autorizacion, Met_Pago, Hora_Ent) VALUES ('$NroCliente', '$fecha', 0, '$metodo', '$entrega')";
                        $resultadoOrden = mysqli_query($con, $sqlOrden);
                
                        // Devuelve el último numero de orden
                        $sql = "SELECT NroOrden FROM orden ORDER BY NroOrden DESC LIMIT 1";
                        $resultado = mysqli_query($con, $sql);
                        $NroOrdenFetch = $resultado->fetch_assoc();
                        $NroOrden = $NroOrdenFetch['NroOrden'];

                        ?>
                        <div class="round">
                            <span class="h3">Factura</span>
                            <p>No. Factura: <strong><?php echo $NroOrden ?></strong></p>
                            <p>Fecha: <?php echo $fecha ?></p>
                            <p>Método de pago: <?php echo $metodo ?></p>
                            <p>Horario de entrega: <?php echo $entrega ?></p>
                        </div>
                    </td>
                </tr>
            </table>

            <table id="factura_cliente">
                <tr>
                    <td class="info_cliente">
                        <div class="round">
                            <span class="h3">Cliente</span>
                            <table class="datos_cliente">
                                <?php 
                                $sql = "SELECT * FROM cliente, clientetel, clienteweb WHERE cliente.Nrocliente = $NroCliente && cliente.NroCliente = clientetel.NroCliente && cliente.NroCliente = clienteweb.NroCliente";
                                $resultado = mysqli_query($con, $sql);
                                $clienteInfo = $resultado->fetch_assoc();
                                if(is_null($clienteInfo)){
                                    $sql = "SELECT * FROM cliente, clientetel, clienteempresa WHERE cliente.Nrocliente = $NroCliente && cliente.NroCliente = clientetel.NroCliente && cliente.NroCliente = clienteempresa.NroCliente";
                                    $resultado = mysqli_query($con, $sql);
                                    $clienteInfo = $resultado->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><label>RUT:</label> <p><?php echo $clienteInfo['RUT'] ?></p></td>
                                        <td><label>Teléfono:</label> <p><?php echo $clienteInfo['Tel'] ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><label>Nombre:</label> <p><?php echo $clienteInfo['Nombre']  ?></p></td>
                                        <td><label>Dirección:</label> <p><?php echo $clienteInfo['barrio'] . ', ' . $clienteInfo['Calle'] . ' esq ' . $clienteInfo['Esquina'] . ', NºPuerta ' . $clienteInfo['NroPuerta'] . ', NºApartamento ' . $clienteInfo['NroApt'] ?></p></td>
                                    </tr>
                                <?php }else{ ?>
                                    <tr>
                                        <td><label>CI:</label> <p><?php echo $clienteInfo['CI'] ?></p></td>
                                        <td><label>Teléfono:</label> <p><?php echo $clienteInfo['Tel'] ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><label>Nombre:</label> <p><?php echo $clienteInfo['Nombre'] . ' ' . $clienteInfo['Apellido']  ?></p></td>
                                        <td><label>Dirección:</label> <p><?php echo $clienteInfo['barrio'] . ', ' . $clienteInfo['Calle'] . ' esq ' . $clienteInfo['Esquina'] . ', NºPuerta ' . $clienteInfo['NroPuerta'] . ', NºApartamento ' . $clienteInfo['NroApt'] ?></p></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="factura_detalle">
                <thead>
                    <tr>
                        <th width="50px">Cant.</th>
                        <th class="textleft">Descripción</th>
                        <th class="textright" width="150px">Precio Unitario.</th>
                        <th class="textright" width="150px"> Precio Total</th>
                    </tr>
                </thead>
                <tbody id="detalle_productos">
        
        <?php
        unset($sql);
        unset($resultado);

        // Recorre los datos enviados y los guarda en arreglos que a su vez se envían a la BD en la tabla pide
        for($j = 0; $j < count($_GET['idvegetal']); $j++){
            $idVegetal = $_GET['idvegetal'][$j];
            $idVariedad = $_GET['idvariedad'][$j];
            echo "<tr>";
			    echo "<td class='textcenter'>" . $cantidad = $_GET['cantidad'][$j] . "</td>";
                $sql = "SELECT Nombre, NombreVariedad FROM vegetal, variedad WHERE vegetal.IdVegetal = $idVegetal && variedad.IdVariedad = $idVariedad";
                $resultado = mysqli_query($con, $sql);
                $vegetalVariedad = $resultado->fetch_assoc();
                echo "<td>" . $vegetalVariedad['Nombre'] . ", " . $vegetalVariedad['NombreVariedad'] . "</td>";
				echo "<td class='textright'>$" . $precio = $_GET['precio'][$j] . "</td>";
				echo "<td class='textright'>$" . $resultado = (int)$precio * (int)$cantidad . "</td>";
			echo "</tr>";
            unset($sql);
            
            $sql[$j] = "INSERT INTO pide (NroOrden, IdVariedad, NroCliente, Fecha, PrecioTotal, Cant, PrecioUnitario, IdVegetal) VALUES ('$NroOrden', '$idVariedad', '$NroCliente', '$fecha', '$resultado', '$cantidad', '$precio', '$idVegetal')";
            $resultado[$j] = mysqli_query($con, $sql[$j]);
        }


        unset($sql);
        unset($resultado);
        ?>
            <tfoot id="detalle_totales">
                    <tr>
                        <td colspan="3" class="textright"><span>SUBTOTAL.</span></td>
                        <td class="textright"><span>$
                        <?php
                            $sql ="SELECT SUM(PrecioTotal) subtotal FROM pide WHERE Fecha='$fecha'";
                            $resultado = mysqli_query($con, $sql);
                            $subtotal = $resultado->fetch_assoc();
                            echo $subtotal['subtotal'];
                        ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="textright"><span>IVA (22%)</span></td>
                        <td class="textright"><span>$ <?php $ivaAplicado = $subtotal['subtotal']*0.22; echo $ivaAplicado ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="textright"><span>TOTAL</span></td>
                        <td class="textright"><span>$ <?php $total = $subtotal['subtotal']+$ivaAplicado; echo $total ?></span></td>
                    </tr>
            </tfoot>
            </table>
            <div>
                <p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nosotros mediante correo electrónico.</p>
                <h4 class="label_gracias">¡Gracias por su compra!</h4>
	        </div>
            <div class="contenedor-boton">
                <a href="tienda.php?compra=1" class="boton boton-volver">Volver</a>
            </div>
        </div>

        <?php
    }else{
        if(isset($_POST['variedad'][0]) && isset($_POST['carrito'])){
            echo "<form action='compra.php' method='GET' class='elegirCantidad'>";
            echo "<h3>Elige la cantidad de productos que deseas</h3>";
            obtenerVariedades($con);
            echo "<fieldset>";
            echo "<label>Método de pago</label>";
            echo "<select name='metodo' required>";
            echo "<option value='Contado'>Contado</option>";
            echo "<option value='Tarjeta de crédito'>Tarjeta de crédito</option>";
            echo "<option value='Tarjeta de débito'>Tarjeta de débito</option>";
            echo "</select>";
            echo "<label>Hora de entrega</label>";
            echo "<select name='entrega' required>";
            echo "<option value='08:00 - 12:00'>08:00 - 12:00</option>";
            echo "<option value='12:00 - 16:00'>12:00 - 16:00</option>";
            echo "<option value='16:00 - 20:00'>16:00 - 20:00</option>";
            echo "</select>";
            echo "</fieldset>";
            echo "<input type='hidden' name='fecha' value='" .  date('Y-m-d h:i:sa') . "'>";
            echo "<input type='submit' value='Comprar' name='comprar' class='boton'>";
            echo "</form>";
        }else{
            header("Location: tienda.php");
        }
    }
?>

<script src="../javascript/pantallaCarga.js"></script>
<script src="../javascript/temaNavegador.js"></script>