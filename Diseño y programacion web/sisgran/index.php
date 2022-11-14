<?php
    require 'includes/funciones.php';

    $archivo = "head";
    $css = "index";
    $titulo = "Sisgran";
    $index = true;
    incluirArchivo($archivo, $css, $titulo, $index);

    include ('includes/carrito.php');
?>

    <main class="contenedor">
        <div class="contenedor-nuestros-productos">
            <h2 class="titulo-seccion">Nuestros productos</h2>
            <div class="nuestros-productos" id="nuestros-productos">
            <?php
                include 'includes/conexion.php';
                $sql = "SELECT * FROM vegetal";
                $resultado = mysqli_query($con, $sql);

                while($fila = mysqli_fetch_assoc($resultado)){?>
                    <div class="producto">
                        <div class="producto-imagen">
                            <img src="images/productos/<?php echo $fila['Nombre'] ?>.png" alt=<?php echo $fila['Nombre'] ?>>
                        </div>
                        <div class="producto-info">
                            <h2 class="producto-titulo"><?php echo $fila['Nombre'] ?></h2>
                        </div>
                    </div>
                <?php } ?>
            </div> <!-- Fin .nuestros-productos -->
        </div>
        <div class="tienda" id="tienda">
            <h2 class="titulo-seccion">¿Quieres comprar nuestros productos?</h2>
            <a href="php/tienda.php" class="boton">Ir a la tienda</a>
        </div>
        <div class="institucional" id="institucional">
            <h2 class="titulo-seccion">Institucional</h2>
            <div class="institucional-info">
                <div class="mision">
                    <h3>Misión</h3>
                    <p>Nuestra misión es brindarte alimentos completamente naturales sin aditivos químicos a tu mesa, para que puedas disfrutar de una comida saludable.</p>
                </div>
                <div class="vision">
                    <h3>Visión</h3>
                    <p>Nuestra visión es crecer a nivel nacional pudiendo hacer que todos los uruguayos tengan una alimentación más saludable.</p>
                </div>
            </div>
            <div class="valores">
                <h3>Valores</h3>
                <p>Nos representamos a través de valores que fomentan la economía social y solidaria, la organización horizontal de nuestros asociados, el cuidado del medio ambiente y la consideración del trabajo como un factor de cambio social.</p>
            </div>
        </div>
    </main>
    <script src="javascript/pantallaCarga.js"></script>
    <script src="javascript/temaNavegador.js"></script>
    <script src="javascript/carrito.js"></script>

<?php
    $archivo = "footer";
    $index = true;
    incluirArchivo($archivo, $css, $titulo, $index);
?>