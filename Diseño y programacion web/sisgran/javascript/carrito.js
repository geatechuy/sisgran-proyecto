// Selección del DOM del carrito
const carritoIcono = document.getElementById('carrito-icono');
const carrito = document.getElementById('carrito');
const cerrarCarrito = document.getElementById('cerrar-carrito');
const contenedorTienda = document.getElementById('contenedor-tienda');

// Muestra el carrito cuando se clickea su icono en el header
carritoIcono.addEventListener('click', function(){
    carrito.classList.add('mostrar-carrito');
    carrito.classList.remove('ocultar-carrito');

});

// Oculta el carrito cuando se clickea el botón de cerrar
cerrarCarrito.addEventListener('click', function(){
    carrito.classList.add('ocultar-carrito');
    carrito.classList.remove('mostrar-carrito');
});

// Oculta el carrito cuando se clickea fuera del mismo
contenedorTienda.addEventListener('click', function(){
    carrito.classList.add('ocultar-carrito');
    carrito.classList.remove('mostrar-carrito');
});