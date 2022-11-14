// DOM
const navInformaticos = document.getElementById('informaticos');
const navAdministradores = document.getElementById('administradores');
const navDirectores = document.getElementById('directores');

const informaticos = document.getElementById('informatico')
const administradores = document.getElementById('administrador')
const directores = document.getElementById('director')

// Cuando se clickea un botón muestra y oculta secciones
navInformaticos.addEventListener('click', () => {
    informaticos.style.display = "flex";
    administradores.style.display = "none";
    directores.style.display = "none";
})

navAdministradores.addEventListener('click', () => {
    informaticos.style.display = "none";
    administradores.style.display = "flex";
    directores.style.display = "none";
})

navDirectores.addEventListener('click', () => {
    informaticos.style.display = "none";
    administradores.style.display = "none";
    directores.style.display = "flex";
})

// Auto abrir sección cuando se reincia la página
const url = window.location.href;
const seccion = url.split('#')[1];

if(seccion != undefined){
    switch(seccion){
        case 'informaticos': informaticos.style.display = "flex"; break;
        case 'administradores': administradores.style.display = "flex"; break;
        case 'directores': directores.style.display = "flex"; break;
    }
}