const btnCerrarModal = document.querySelectorAll('.cerrar-modal');
const modal = document.querySelectorAll('.modal-variedades');
const btnVariedad = document.querySelectorAll('.botonProducto');
const bgModal = document.querySelectorAll('.bg-modal');

// Para cada modal se le da un event listener
const btnProductosModal = document.querySelectorAll('.producto-boton');
btnProductosModal.forEach((producto) => {
    producto.addEventListener("click", () => {
        modal.item(producto.id-1).classList.add('mostrar');
        bgModal.item(producto.id-1).classList.add('mostrar');
    });
});

// Cerrar modal cuando se clickea el botón de cerrar
btnCerrarModal.forEach((btn) => {
    btn.addEventListener("click", () =>{
        modal.item(btn.id-1).classList.remove('mostrar');
        bgModal.item(btn.id-1).classList.remove('mostrar');
    });
});


// Cerrar modal cuando se clickea afuera del modal
bgModal.forEach((bg) => {
    bg.addEventListener("click", () =>{
        modal.item(bg.id-1).classList.remove('mostrar');
        bgModal.item(bg.id-1).classList.remove('mostrar');
    });
});

// Cerrar modal cuando se clickea una variedad
btnVariedad.forEach((btn) => {
    btn.addEventListener("click", () =>{
        modal.item(btn.id-1).classList.remove('mostrar');
        bgModal.item(btn.id-1).classList.remove('mostrar');
    });
});