// DOM
const navInfoHuertas = document.getElementById('huertas');
const navInfoPedidos = document.getElementById('pedidos');
const navValidarClientes = document.getElementById('clientes');

const infoHuertas = document.getElementById('infoHuertas')
const infoPedidos = document.getElementById('infoPedidos')
const validarClientes = document.getElementById('validarClientes')

// Cuando se clickea un botón muestra y oculta secciones
navInfoHuertas.addEventListener('click', () => {
    infoHuertas.style.display = "flex";
    infoPedidos.style.display = "none";
    validarClientes.style.display = "none";
})

navInfoPedidos.addEventListener('click', () => {
    infoHuertas.style.display = "none";
    infoPedidos.style.display = "flex";
    validarClientes.style.display = "none";
})

navValidarClientes.addEventListener('click', () => {
    infoHuertas.style.display = "none";
    infoPedidos.style.display = "none";
    validarClientes.style.display = "flex";
})

// Auto abrir sección cuando se reincia la página
const url = window.location.href;
const seccion = url.split('#')[1];

if(seccion != undefined){
    switch(seccion){
        case 'infoHuertas': infoHuertas.style.display = "flex"; break;
        case 'infoPedidos': infoPedidos.style.display = "flex"; break;
        case 'validarClientes': validarClientes.style.display = "flex"; break;
    }
}