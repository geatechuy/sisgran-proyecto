// Seleccionar botones del nav en el DOM
const btnHuerta = document.getElementById('huerta');
const btnCliente = document.getElementById('cliente');
const btnEmpresa = document.getElementById('empresa');
const btnPendiente = document.getElementById('pendiente');
const btnCatalogo = document.getElementById('catalogo');
const btnPedido = document.getElementById('pedido');
const btnVenta = document.getElementById('venta');
const btnCadete = document.getElementById('cadete');

// Seleccionar contenedor de vistas en el DOM
const huertas = document.getElementById('huertas');
const clientes = document.getElementById('clientes');
const empresas = document.getElementById('empresas');
const pendientes = document.getElementById('pendientes');
const catalogos = document.getElementById('catalogos');
const pedidos = document.getElementById('pedidos');
const ventas = document.getElementById('ventas');
const cadetes = document.getElementById('cadetes');

// Auto abrir sección cuando se reincia la página
const url = window.location.href;
const seccion = url.split('#')[1];

if(seccion != undefined){
    switch(seccion){
        case 'huertas': huertas.style.display = "flex"; break;
        case 'clientes': clientes.style.display = "flex"; break;
        case 'empresas': empresas.style.display = "flex"; break;
        case 'pendientes': pendientes.style.display = "flex"; break;
        case 'catalogos': catalogos.style.display = "flex"; break;
        case 'pedidos': pedidos.style.display = "flex"; break;
        case 'ventas': ventas.style.display = "flex"; break;
        case 'cadetes': cadetes.style.display = "flex"; break;
    }
}

// Cuando se clickea un botón muestra y oculta secciones
btnHuerta.addEventListener('click', () => {
    huertas.style.display = "flex";
    clientes.style.display = "none";
    empresas.style.display = "none";
    pendientes.style.display = "none";
    catalogos.style.display = "none";
    pedidos.style.display = "none";
    ventas.style.display = "none";
    cadetes.style.display = "none";
})

btnCliente.addEventListener('click', () => {
    huertas.style.display = "none";
    clientes.style.display = "flex";
    empresas.style.display = "none";
    pendientes.style.display = "none";
    catalogos.style.display = "none";
    pedidos.style.display = "none";
    ventas.style.display = "none";
    cadetes.style.display = "none";
})

btnEmpresa.addEventListener('click', () => {
    huertas.style.display = "none";
    clientes.style.display = "none";
    empresas.style.display = "flex"
    pendientes.style.display = "none";
    catalogos.style.display = "none";
    pedidos.style.display = "none";
    ventas.style.display = "none";
    cadetes.style.display = "none";
})

btnPendiente.addEventListener('click', () => {
    huertas.style.display = "none";
    clientes.style.display = "none";
    empresas.style.display = "none"
    pendientes.style.display = "flex"
    catalogos.style.display = "none";
    pedidos.style.display = "none";
    ventas.style.display = "none";
    cadetes.style.display = "none";
})

btnCatalogo.addEventListener('click', () => {
    huertas.style.display = "none";
    clientes.style.display = "none";
    empresas.style.display = "none"
    pendientes.style.display = "none"
    catalogos.style.display = "flex"
    pedidos.style.display = "none";
    ventas.style.display = "none";
    cadetes.style.display = "none";
})

btnPedido.addEventListener('click', () => {
    huertas.style.display = "none";
    clientes.style.display = "none";
    empresas.style.display = "none"
    pendientes.style.display = "none"
    catalogos.style.display = "none"
    pedidos.style.display = "flex";
    ventas.style.display = "none";
    cadetes.style.display = "none";
})

btnVenta.addEventListener('click', () => {
    huertas.style.display = "none";
    clientes.style.display = "none";
    empresas.style.display = "none"
    pendientes.style.display = "none"
    catalogos.style.display = "none"
    pedidos.style.display = "none";
    ventas.style.display = "flex";
    cadetes.style.display = "none";
})

btnCadete.addEventListener('click', () => {
    huertas.style.display = "none";
    clientes.style.display = "none";
    empresas.style.display = "none";
    pendientes.style.display = "none";
    catalogos.style.display = "none";
    pedidos.style.display = "none";
    ventas.style.display = "none";
    cadetes.style.display = "flex";
})