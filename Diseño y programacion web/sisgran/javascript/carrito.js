// Selección del DOM del carrito
const carritoIcono = document.getElementById('carrito-icono');
const carrito = document.getElementById('carrito');
const cerrarCarrito = document.getElementById('cerrar-carrito');
const contenedor = document.querySelector('.contenedor');
const carritoBody = document.getElementById('carritoBody');
const borrarCarrito = document.getElementById('borrar-carrito');

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
contenedor.addEventListener('click', function(){
    carrito.classList.add('ocultar-carrito');
    carrito.classList.remove('mostrar-carrito');
});

// Si ya hay productos en el carrito
let i = 0;
if(sessionStorage){
    for(let i = 100; i<sessionStorage.length; i++){
        const productoSesion = sessionStorage.getItem(i);
        const producto = productoSesion.split(',');

        const crearProductoCarrito = document.createElement('tr');
        crearProductoCarrito.innerHTML = 
        `<td>${producto[0]}</td>
        <td> ${producto[1]}</td>
        <td>$${producto[3]}</td>
        <input name="variedad[${i}]" type="hidden" value="${producto[2]}">`; 
        carritoBody.appendChild(crearProductoCarrito);
    }
}

// sessionStorage para seleccionar productos
const btnProductos = document.querySelectorAll('.botonProducto');
btnProductos.forEach((elemento) => {
    elemento.addEventListener("click", () => {
        const productoVegetal = elemento.dataset.vegetal;
        const productoVariedad = elemento.dataset.variedad;
        const productoIdVariedad = elemento.dataset.idvariedad;
        const productoPrecio = elemento.dataset.precio;
        const producto = [productoVegetal, productoVariedad, productoIdVariedad, productoPrecio];

        
        const crearProductoCarrito = document.createElement('tr');
        sessionStorage.setItem(i, producto)
        crearProductoCarrito.innerHTML = 
        `<td>${producto[0]}</td>
        <td>${producto[1]}</td>
        <td>$${producto[3]}</td>
        <input name="variedad[${i}]" type="hidden" value="${productoIdVariedad}">`;  
        carritoBody.appendChild(crearProductoCarrito);

        i++;
    });
});

// Borrar carrito
borrarCarrito.addEventListener("click", () => {
    sessionStorage.clear();
    while (carritoBody.firstChild) {
        carritoBody.removeChild(carritoBody.firstChild);
      }
      i = 0;
});

// Si se finalizó la compra borrar el carrito
const valor = window.location.search;
const paramUrl = new URLSearchParams(valor);
const compra = paramUrl.get('compra');
if(compra==1){
    sessionStorage.clear();
    while (carritoBody.firstChild) {
        carritoBody.removeChild(carritoBody.firstChild);
      }
      i = 0;
}