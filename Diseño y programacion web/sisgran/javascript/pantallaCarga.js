// Seleccionar body
const body = document.getElementById('body');

// Crear elementos HTML para la pantalla de carga
const contenedorCarga = document.createElement('div'); // Crea un div
contenedorCarga.classList.add('contenedor-carga'); // Le añade la clase 'contenedor-carga' al div
const imagenCarga = document.createElement('img'); // Crea una imagen
imagenCarga.classList.add('imagen-carga'); // Le añade la clase 'imagen-carga' a la imagen

// Variable para la URL actual (ya creada en temaNavegador.js)
URLactual = window.location.href; 

switch(URLactual.includes('index.php')){ // Si la URL actual contiene 'index.php'
    case true:
        imagenCarga.src = 'images/GeaTechNegro.png' // Se le da un source a la image
    break;
    case false:
        imagenCarga.src = '../images/GeaTechNegro.png' // Se le da un source a la image
    break;
}

imagenCarga.alt = 'Logo GeaTech' // Se le da un alt a la imagen

body.appendChild(contenedorCarga); // Coloca el div en el body
contenedorCarga.appendChild(imagenCarga); // Coloca la imagen dentro del div

// Función para crear una pantalla de carga
window.addEventListener("load", function(){
    contenedorCarga.classList.add('ocultar');
});