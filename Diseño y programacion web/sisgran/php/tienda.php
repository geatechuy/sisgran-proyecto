<?php
    require '../includes/funciones.php';

    $archivo = "head";
    $css = "tienda";
    $titulo = "Sisgran - Tienda";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);

    include "../includes/conexion.php";
    // Bloque de codigo para restringir acceso a la tienda a solo los usuarios registrados en el sistema
    // session_start(); // esta línea se ejecuta en el archivo head.php para mostrar botones
    $usuario = $_SESSION['nombre'];
    if(!isset($usuario)){
        header("Location: inicio-sesion.php");
    }
    // Fin bloque

    // Carrito
    include ('../includes/carrito.php');
?>

    <main id="contenedor-tienda" class="contenedor">
        <h3 class="saludo-usuario">Bienvenido/a a Sisgran, <span> <?php echo $_SESSION['nombre']; ?></span></h3>
        <h2 class="titulo-seccion">Tienda</h2>
        <div class="contenedor-tienda">
            <?php
                // Usar este código para automatizar la muestra de vegetales en la página web con la BD
                $sql = "SELECT * FROM vegetal";
                $resultadoVegetal = mysqli_query($con, $sql);

                while($filaVegetal = mysqli_fetch_assoc($resultadoVegetal)){
                    $idVegetal = $filaVegetal['IdVegetal'];
                    ?>
                    <div class="producto" id="<?php echo $filaVegetal['IdVegetal'] ?>">
                        <div id="<?php echo $filaVegetal['IdVegetal'] ?>" class="bg-modal"></div>
                        <div class="modal-variedades">
                            <div class="header">
                                <p>Escoja una variedad</p>
                                <i id="<?php echo $filaVegetal['IdVegetal'] ?>" class="fa-solid fa-x cerrar-modal"></i>
                            </div>
                            <div class="body">
                                <?php 
                                    $sql = "SELECT * FROM variedad WHERE IdVegetal=$idVegetal";
                                    $resultado = mysqli_query($con, $sql);
                                    
                                    while ($fila = mysqli_fetch_assoc($resultado)){?>
                                        <button class="botonProducto" id="<?php echo $filaVegetal['IdVegetal'] ?>" data-vegetal="<?php echo $filaVegetal['Nombre'] ?>" data-variedad="<?php echo $fila['NombreVariedad'] ?>" data-idvariedad="<?php echo $fila['IdVariedad'] ?>" data-precio="<?php echo $fila['Precio'] ?>">
                                            <p class="nombreProducto"><?php echo $fila['NombreVariedad'] ?></p>
                                            <p class="precioProducto">$<?php echo $fila['Precio'] ?></p>
                                        </button>
                                <?php } ?> <!-- FIN SEGUNDO WHILE -->
                            </div>
                        </div>
                        <div class="producto-imagen">
                            <img src="../images/productos/<?php echo $filaVegetal['Nombre'] ?>.png" alt=<?php echo $filaVegetal['Nombre'] ?>>
                        </div>
                        <div class="producto-info">
                            <h2 class="producto-titulo"><?php echo $filaVegetal['Nombre'] ?></h2>
                            <button class="producto-boton boton" id="<?php echo $filaVegetal['IdVegetal'] ?>">Añadir</button>
                        </div>
                    </div>
                <?php } ?> <!-- FIN PRIMER WHILE -->
        </div> <!-- .contenedor-tienda -->
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>
    <script src="../javascript/carrito.js"></script>
    <script src="../javascript/producto.js"></script>
    
<?php
    $archivo = "footer";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>