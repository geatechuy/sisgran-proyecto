<div id="carrito" class="carrito ocultar-carrito">
        <i id="cerrar-carrito" class="cerrar-carrito fa-solid fa-xmark"></i>
        <h3 class="titulo-carrito">Carrito de compras</h3>
        <p class="subtitulo-carrito">Productos</p>
        <form action="compra.php" method="POST">
            <table class="productos-carrito">
                <thead>
                    <tr>
                        <th>Vegetal</th>
                        <th>Variedad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody id="carritoBody">
                </tbody>
            </table>
            <div class="botones-carrito">
                <p class="boton limpiar-carrito" id="borrar-carrito">Limpiar carrito</p>
                <input type="submit" class="boton comprar-carrito" value="Comprar carrito" name="carrito"></a>
            </div>
        </form>
    </div>