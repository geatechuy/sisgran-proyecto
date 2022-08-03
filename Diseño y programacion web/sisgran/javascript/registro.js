// Botones tipo de usuario
const usuarioWeb = document.getElementById('cliente-web');
const usuarioEmpresa = document.getElementById('cliente-empresa');
const usuarioHuerta = document.getElementById('huerta-ecologica');

// Formularios
const formularioWeb = document.getElementById('cliente-web-formulario');
const formularioEmpresa = document.getElementById('cliente-empresa-formulario');
const formularioHuerta = document.getElementById('huerta-ecologica-formulario');

// Radio de elección de documento para cliente web
const radioCi = document.getElementById('ci');
const radioPasaporte = document.getElementById('pasaporte');

// Formulario de CI y Pasaporte
const formularioCI = document.querySelector('.ci');
const formularioPasaporte = document.querySelector('.pasaporte');

// Funciones para elejir documento en cliente web
radioCi.addEventListener('click', function(){
    formularioCI.classList.remove('ocultar');
    formularioPasaporte.classList.add('ocultar');
});

radioPasaporte.addEventListener('click', function(){
    formularioCI.classList.add('ocultar');
    formularioPasaporte.classList.remove('ocultar');
});

// Funciones para mostrar formularios
usuarioWeb.addEventListener('click', function(){
    formularioWeb.classList.remove('ocultar');
    formularioEmpresa.classList.add('ocultar');
    formularioHuerta.classList.add('ocultar');

    usuarioWeb.classList.add('activo-menu');
    usuarioEmpresa.classList.remove('activo-menu');
    usuarioHuerta.classList.remove('activo-menu');
});

usuarioEmpresa.addEventListener('click', function(){
    formularioWeb.classList.add('ocultar');
    formularioEmpresa.classList.remove('ocultar');
    formularioHuerta.classList.add('ocultar');

    usuarioWeb.classList.remove('activo-menu');
    usuarioEmpresa.classList.add('activo-menu');
    usuarioHuerta.classList.remove('activo-menu');
});

usuarioHuerta.addEventListener('click', function(){
    formularioWeb.classList.add('ocultar');
    formularioEmpresa.classList.add('ocultar');
    formularioHuerta.classList.remove('ocultar');

    usuarioWeb.classList.remove('activo-menu');
    usuarioEmpresa.classList.remove('activo-menu');
    usuarioHuerta.classList.add('activo-menu');
});