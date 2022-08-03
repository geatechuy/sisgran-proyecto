<?php
    require '../includes/funciones.php';

    $archivo = "head";
    $css = "contacto";
    $titulo = "Sisgran - Contacto";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>

    <main class="contenedor">
        <div class="contenedor-formulario">
            <h2 class="titulo-seccion">Contacto</h2>
            <form action="" method="post">
                <div class="contenedor-inputs">
                    <div class="campo nombre">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" required placeholder="Ej: Juan">
                    </div>
                    <div class="campo email">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required placeholder="Ej: juan2022@gmail.com">
                    </div>
                    <div class="campo asunto">
                        <label for="asunto">Asunto:</label>
                        <input type="text" name="asunto" id="asunto" required placeholder="Ej: Cancelar pedido">
                    </div>
                    <div class="campo mensaje">
                        <label for="mensaje">Mensaje:</label>
                        <textarea name="mensaje" id="mensaje"  required placeholder="Ej: Quiero cancelar mi pedido ya que no voy a estar en el país para recibirlo."></textarea>
                    </div>
                </div>
                <div class="contenedor-botones">
                    <button type="submit" name="enviar" class="boton">Enviar</button>
                    <?php 
                    
                    if(isset($_POST['enviar'])){
                        enviarCorreo($_POST['nombre'], $_POST['email'], $_POST['asunto'], $_POST['mensaje']);
                    }
                    
                    ?>
                </div>
            </form>
        </div>
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>
    
<?php
    $archivo = "footer";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>