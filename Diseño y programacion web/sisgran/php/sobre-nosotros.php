<?php
    require '../includes/funciones.php';

    $archivo = "head";
    $css = "sobre-nosotros";
    $titulo = "Sisgran - Sobre nosotros";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>

    <main class="contenedor">
        <div>
            <h2 class="titulo-seccion">Sobre nosotros</h2>
            <div class="sobre-nosotros">
                <div>
                    <p>Sisgran es una organización uruguaya conformada por un grupo de huertas ecológicas que tienen el objetivo de brindarte alimentos completamente naturales sin aditivos quimicos. También nos ocupamos de la venta y distribución de dichos alimentos.</p>

                    <p>La calidad y precios justos es la norma esencial que rige a nuestra organización para crear un mercado más igualitario y responsable a través del contacto directo con productores, eliminando intermediarios y fortaleciendo la dignidad del trabajo sin explotación.</p>

                    <p>Nos representamos a través de valores que fomentan la economía social y solidaria, la organización horizontal de nuestros asociados, el cuidado del medio ambiente y la consideración del trabajo como un factor de cambio social.</p>
                </div>
                <img src="../images/imagen sobre nosotros.jpg" alt="Huerta">
            </div>
        </div>
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>

<?php
    $archivo = "footer";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>