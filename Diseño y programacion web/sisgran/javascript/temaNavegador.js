// Favicon de la página
let link = document.createElement('link'); // Crea un elemento link
link.type = 'image/png'; // Tipo de archivo
link.rel = 'shortcut icon'; // Relación
document.getElementsByTagName('head')[0].appendChild(link); // Agrega el elemento link al head

// Crea una variable para el tema oscuro
const temaOscuro = window.matchMedia("(prefers-color-scheme: dark)");

// Crea una variable para la URL actual
let URLactual = window.location.href;

switch(URLactual.includes('index.php')){ // Si la URL actual contiene 'index.php'
    case true:
        if(temaOscuro.matches){ // Si el tema oscuro es activado
            link.href = 'images/LogoBlancoHoja.png';
        }else{ // Si el tema oscuro no es activado
            link.href = 'images/LogoNegroHoja.png';
        }
    break;

    case false:
        if(temaOscuro.matches){ // Si el tema oscuro es activado
            link.href = '../images/LogoBlancoHoja.png';
        }else{ // Si el tema oscuro no es activado
            link.href = '../images/LogoNegroHoja.png';
        }
    break;
}