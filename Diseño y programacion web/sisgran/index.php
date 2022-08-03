<?php
    require 'includes/funciones.php';

    $archivo = "head";
    $css = "index";
    $titulo = "Sisgran";
    $index = true;
    incluirArchivo($archivo, $css, $titulo, $index);
?>

    <main class="contenedor">
        <div class="contenedor-nuestros-productos">
            <h2 class="titulo-seccion">Nuestros productos</h2>
            <div class="nuestros-productos" id="nuestros-productos">
                <div class="producto">
                    <img src="images/productos/acelga.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Acelga</p>
                        <p class="precio">$350</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/aji.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Aji</p>
                        <p class="precio">$95</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/ajo.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Ajo</p>
                        <p class="precio">$105</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/apio.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Apio</p>
                        <p class="precio">$200</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/arvejas.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Arvejas</p>
                        <p class="precio">$70</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/berenjena.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Berenjena</p>
                        <p class="precio">$120</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/remolacha.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Remolacha</p>
                        <p class="precio">$80</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/Cebolla.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Cebolla</p>
                        <p class="precio">$95</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/cebollin.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Cebollin</p>
                        <p class="precio">$100</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/frutilla.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Frutilla</p>
                        <p class="precio">$150</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/habas.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Habas</p>
                        <p class="precio">$150</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/lechuga.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Lechuga</p>
                        <p class="precio">$100</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/choclo.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Choclo</p>
                        <p class="precio">$80</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/papa.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Papa</p>
                        <p class="precio">$60</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/pimenton.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Pimentón</p>
                        <p class="precio">$100</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/porotos.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Porotos</p>
                        <p class="precio">$99</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/porotos-verdes.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Porotos verdes</p>
                        <p class="precio">$99</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/repollo.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Repollo</p>
                        <p class="precio">$150</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/tomate.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Tomate</p>
                        <p class="precio">$100</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="images/productos/zanahoria.png" alt="Producto 1">
                    <div class="producto-info">
                        <p class="nombre">Zanahoria</p>
                        <p class="precio">$135</p>
                    </div>
                </div>
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

<?php
    $archivo = "footer";
    $index = true;
    incluirArchivo($archivo, $css, $titulo, $index);
?>