<?php
    require '../includes/funciones.php';

    $archivo = "head";
    $css = "contacto";
    $titulo = "Sisgran - Contacto";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);

    include ('../includes/carrito.php');
?>

    <main class="contenedor">
        <div class="contenedor-formulario">
            <h2 class="titulo-seccion">Contacto</h2>
            <form id="form">
                <div class="contenedor-inputs">
                    <div class="campo nombre">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" required placeholder="Ej: Juan">
                    </div>
                    <div class="campo asunto">
                        <label for="asunto">Asunto:</label>
                        <input type="text" name="asunto" id="asunto" required placeholder="Ej: Cancelar pedido">
                    </div>
                    <div class="campo email">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" required placeholder="Ej: juan2022@gmail.com">
                    </div>
                    <div class="campo mensaje">
                        <label for="mensaje">Mensaje:</label>
                        <textarea type="text" name="mensaje" id="mensaje" required placeholder="Ej: Quiero cancelar mi pedido ya que no voy a estar en el país para recibirlo."></textarea>
                    </div>
                </div>
                <div class="contenedor-botones">
                    <input type="submit" id="button" value="Enviar correo" class="boton">
                </div>
            </form>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
            <script type="text/javascript">emailjs.init('zydYFZ6Cl7l8yR4fl')</script>
        
        </div>
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>
    <script src="../javascript/carrito.js"></script>
    <script src="../javascript/contacto.js"></script>
    
<?php
    $archivo = "footer";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>