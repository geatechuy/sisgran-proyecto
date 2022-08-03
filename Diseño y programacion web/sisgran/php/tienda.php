<?php
    require '../includes/funciones.php';

    $archivo = "head";
    $css = "tienda";
    $titulo = "Sisgran - Tienda";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);

    conexionBD("localhost", "lsanchez", "Leo9903!", "geatech");
?>

    <div id="carrito" class="carrito ocultar-carrito">
        <i id="cerrar-carrito" class="cerrar-carrito fa-solid fa-xmark"></i>
        <h3 class="titulo-carrito">Carrito de compras</h3>
        <p class="subtitulo-carrito">Productos</p>
         
        <?php
            $productos = true;
            if($productos){
            
        ?>
        <table class="productos-carrito">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Acelga</td>
                    <td>1</td>
                    <td>$100</td>
                    <td>
                        <i id="aumentar-cantidad" class="boton-producto fa-solid fa-plus"></i>
                        <i id="disminuir-cantidad" class="boton-producto fa-solid fa-minus"></i>
                        <i id="borrar-producto" class="boton-producto fa-solid fa-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>Acelga</td>
                    <td>1</td>
                    <td>$100</td>
                    <td>
                        <i id="aumentar-cantidad" class="boton-producto fa-solid fa-plus"></i>
                        <i id="disminuir-cantidad" class="boton-producto fa-solid fa-minus"></i>
                        <i id="borrar-producto" class="boton-producto fa-solid fa-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>Acelga</td>
                    <td>1</td>
                    <td>$100</td>
                    <td>
                        <i id="aumentar-cantidad" class="boton-producto fa-solid fa-plus"></i>
                        <i id="disminuir-cantidad" class="boton-producto fa-solid fa-minus"></i>
                        <i id="borrar-producto" class="boton-producto fa-solid fa-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>Acelga</td>
                    <td>1</td>
                    <td>$100</td>
                    <td>
                        <i id="aumentar-cantidad" class="boton-producto fa-solid fa-plus"></i>
                        <i id="disminuir-cantidad" class="boton-producto fa-solid fa-minus"></i>
                        <i id="borrar-producto" class="boton-producto fa-solid fa-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>Acelga</td>
                    <td>1</td>
                    <td>$100</td>
                    <td>
                        <i id="aumentar-cantidad" class="boton-producto fa-solid fa-plus"></i>
                        <i id="disminuir-cantidad" class="boton-producto fa-solid fa-minus"></i>
                        <i id="borrar-producto" class="boton-producto fa-solid fa-trash"></i>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php }else{ ?>
            <p class="carrito-vacio">No hay productos en el carrito</p>
        <?php } ?>

        
        <div class="info-carrito">
            <p class="info-carrito-precio">Precio: <?php echo "$500"?> </p>
            <p class="info-carrito-cantidad">Cantidad: <?php echo "25 productos" ?> </p>
        </div>
        <div class="botones-carrito">
            <button class="boton limpiar-carrito">Limpiar carrito</button>
            <button class="boton comprar-carrito">Comprar carrito</button>
        </div>
    </div>
    <main id="contenedor-tienda" class="contenedor">
        <h2 class="titulo-seccion">Tienda</h2>
        <div class="contenedor-tienda">
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/acelga.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Acelga</h2>
                    <p class="producto-variedades">Niágara, nepaán y verdea criolla</p>
                    <p class="producto-precio">$350</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/aji.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Aji</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$850</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/ajo.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Ajo</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$105</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/apio.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Apio</h2>
                    <p class="producto-variedades">Verdeo y blanqueo</p>
                    <p class="producto-precio">$200</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/arvejas.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Arvejas</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$70</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/berenjena.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Berenjena</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$120</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/remolacha.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Remolacha</h2>
                    <p class="producto-variedades">Chata de Egipto, bunching y del país</p>
                    <p class="producto-precio">$80</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/cebolla.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Cebolla</h2>
                    <p class="producto-variedades">Verdeo y bulbo</p>
                    <p class="producto-precio">$95</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/cebollin.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Cebollin</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$100</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/frutilla.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Frutilla</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$150</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/Habas.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Habas</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$150</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/lechuga.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Lechuga</h2>
                    <p class="producto-variedades">Gallega, morada, criolla, crimor y Grand Rapid</p>
                    <p class="producto-precio">$100</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/choclo.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Choclo</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$80</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/papa.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Papa</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$60</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/pimenton.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Pimentón</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$100</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/porotos.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Porotos</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$99</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/porotos-verdes.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Porotos verdes</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$100</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/repollo.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Repollo</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$150</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/tomate.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Tomate</h2>
                    <p class="producto-variedades">Sin variedades</p>
                    <p class="producto-precio">$100</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
            <div class="producto">
                <div class="producto-imagen">
                    <img src="../images/productos/zanahoria.png" alt="Acelga">
                </div>
                <div class="producto-info">
                    <h2 class="producto-titulo">Zanahoria</h2>
                    <p class="producto-variedades">Criolla, maravilla platense, colmar y chantenay</p>
                    <p class="producto-precio">$135</p>
                    <a href="#" class="producto-boton boton">Añadir</a>
                </div>
            </div>
        </div> <!-- .contenedor-tienda -->
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>
    <script src="../javascript/carrito.js"></script>
    
<?php
    $archivo = "footer";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>