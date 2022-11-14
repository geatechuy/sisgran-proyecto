// DOM para mostrar elementos del nav
const navSeleccionarCultivo = document.getElementById('seleccionar');
const navEstadosCultivos = document.getElementById('estados');
const navProduccionCultivo = document.getElementById('produccion');

const seleccionarCultivos = document.getElementById('seleccionarCultivos')
const estadosCultivos = document.getElementById('estadosCultivos')
const produccionCultivo = document.getElementById('produccionCultivo')


const cultivoAsociado = document.getElementById('cultivoAsociado');
const cultivoBase = document.getElementById('cultivoBase');
const arrayCultivos = [];
const url = window.location.search;
const paramUrl = new URLSearchParams(url);
if(paramUrl.get('base')){
    const base = paramUrl.get('base');
    cultivoBase.value = base;
    seleccionarCultivos.style.display = "flex";
}

cultivoBase.addEventListener('change', (e) => {
    const base = e.target.value;
    arrayCultivos.push(base);
    const ultimoSeleccionado = arrayCultivos.slice(-1);
    window.location.href = "/sisgran/php/usuario-huerta/huerta.php?base=" + ultimoSeleccionado;
});

navSeleccionarCultivo.addEventListener('click', () => {
    seleccionarCultivos.style.display = "flex";
    estadosCultivos.style.display = "none";
    produccionCultivo.style.display = "none";
})

navEstadosCultivos.addEventListener('click', () => {
    seleccionarCultivos.style.display = "none";
    estadosCultivos.style.display = "flex";
    produccionCultivo.style.display = "none";
})

navProduccionCultivo.addEventListener('click', () => {
    seleccionarCultivos.style.display = "none";
    estadosCultivos.style.display = "none";
    produccionCultivo.style.display = "flex";
})

// Auto abrir sección cuando se reincia la página
const urlSeccion = window.location.href;
const seccion = urlSeccion.split('#')[1];

if(seccion != undefined){
    switch(seccion){
        case 'seleccionarCultivos': seleccionarCultivos.style.display = "flex"; break;
        case 'estadosCultivos': estadosCultivos.style.display = "flex"; break;
        case 'produccionCultivo': produccionCultivo.style.display = "flex"; break;
    }
}

// Estilos si las fechas de inicio y fin coinciden
const fechasFin = document.querySelectorAll('.fecha-fin')

fechasFin.forEach( (fecha) => {
    const fechaFin = fecha.textContent;
    const fechaSeparada = fechaFin.split(' '); // Fecha de fin del cultivo en formato -> yyyy-mm-dd
    const fechaActual = new Date().toISOString().slice(0, 10); // Fecha de hoy en el formato -> yyyy-mm-dd

    if(fechaSeparada[0]<=fechaActual){
        fecha.style.background = "#004700";
        fecha.style.color = "#fff";
    }
})