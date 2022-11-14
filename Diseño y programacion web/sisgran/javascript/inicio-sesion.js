// DOM
const mensaje = document.querySelector('.mensajeRegistrado');
const cerrarMensaje = document.querySelector('.cerrarMensaje');

// Auto abrir sección cuando se reincia la página
const url = window.location.href;
const registrado = url.split('#')[1];

if(registrado != undefined){
    mensaje.style.display = "flex";
}

cerrarMensaje.addEventListener("click", () => {
    mensaje.style.display = "none";
})