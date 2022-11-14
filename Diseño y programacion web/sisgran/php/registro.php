<?php
    require '../includes/funciones.php';
    $archivo = "head";
    $css = "registro";
    $titulo = "Sisgran - Registro";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
?>

<body id="body">
    <main class="contenedor">
        <div class="contenedor-imagen">
            <i onclick="history.back()" class="pagina-anterior fa-solid fa-arrow-left"></i>
        </div>
        <div class="contenedor-formulario">
            <div class="cabecera-formulario">
                <a href="../index.php"><img class="logo" src="../images/LogoColor.png" alt="Logo Sisgran"></a> 
                <p class="titulo">Registro de usuario</p>
                <p class="subtitulo">Elija el tipo de usuario</p>
                <ul class="tipo-usuario">
                    <li id="cliente-web" class="activo-menu">Cliente web</li>
                    <li id="cliente-empresa">Cliente empresa</li>
                    <li id="huerta-ecologica">Huerta ecológica</li>
                </ul>
            </div>
            <div class="formulario">
                <form action="../includes/agregar-cliente-web.php" method="POST" id="cliente-web-formulario" class="cliente-web-formulario">
                    <div class="campo-formulario campo-radio">
                        <input class="radio" type="radio" name="documento" id="ci" checked="checked">
                        <label>Cédula de identidad</label>
                        <input class="radio" type="radio" name="documento" id="pasaporte">
                        <label>Pasaporte</label>
                    </div> <!-- FIN .campo-formulario -->
                    <div class="campo-formulario ci">
                        <label>Ingrese su cédula de identidad:</label>
                        <input type="number" name="ci" placeholder="Ej: 53537219" min="1000000">
                    </div> <!-- FIN .campo-formulario .ci -->
                    <div class="campo-formulario pasaporte ocultar">
                        <label>Ingrese su pasaporte:</label>
                        <div>
                            <select name="pasaporte-letra">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                                <option value="K">K</option>
                                <option value="L">L</option>
                                <option value="M">M</option>
                                <option value="N">N</option>
                                <option value="O">O</option>
                                <option value="P">P</option>
                                <option value="Q">Q</option>
                                <option value="R">R</option>
                                <option value="S">S</option>
                                <option value="T">T</option>
                                <option value="U">U</option>
                                <option value="V">V</option>
                                <option value="W">W</option>
                                <option value="X">X</option>
                                <option value="Y">Y</option>
                                <option value="Z">Z</option>
                            </select>
                            <input type="number" name="pasaporte-numeros" placeholder="Ej: 677233" min="1000">
                        </div>
                    </div> <!-- FIN .campo-formulario .pasaporte -->
                    <div class="campo-formulario ">
                        <label>Ingrese su correo electrónico:</label>
                        <input type="email" name="correo" placeholder="Ej: juan.rodriguez@gmail.com">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su contraseña:</label>
                        <input type="password" name="contraseña" placeholder="Su contraseña" min="5" max="16">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su nombre:</label>
                        <input type="text" name="nombre" placeholder="Ej: Juan">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su apellido:</label>
                        <input type="text" name="apellido" placeholder="Ej: Rodríguez">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su teléfono:</label>
                        <input type="number" name="telefono" placeholder="Ej: 093921283" min="100000">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la calle de su hogar:</label>
                        <input type="text" name="calle" placeholder="Ej: General Urquiza">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la puerta de su hogar:</label>
                        <input type="number" name="numero-puerta" placeholder="Ej: 2942" min="1">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el número de su apartamento:</label>
                        <input type="number" name="numero-apartamento" placeholder="Ej: 201" min="1">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la esq. de su hogar:</label>
                        <input type="text" name="esquina" placeholder="Ej: Comandante Braga">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el barrio de su hogar:</label>
                        <input type="text" name="barrio" placeholder="Ej: La Blanqueada">
                    </div> <!-- FIN .campo-formulario  -->
                    <input class="boton" type="submit" name="submit-web" value="Registrarme">
                </form> <!-- FIN .cliente-web -->

                <form action="../includes/agregar-cliente-empresa.php" method="POST" id="cliente-empresa-formulario" class="cliente-empresa-formulario ocultar">
                    <div class="campo-formulario ">
                        <label>Ingrese el nombre de su empresa:</label>
                        <input type="text" name="nombre" placeholder="Ej: GeaTech S.A">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su correo electrónico:</label>
                        <input type="email" name="correo" placeholder="Ej: geatechuy@gmail.com">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su contraseña:</label>
                        <input type="password" name="contraseña" placeholder="Su contraseña">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su RUT:</label>
                        <input type="number" name="rut" placeholder="Ej: 30686957" min="1">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su teléfono:</label>
                        <input type="number" name="telefono" min="1000" placeholder="Ej: 093921283">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la calle de su empresa:</label>
                        <input type="text" name="calle" placeholder="Ej: General Urquiza">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la puerta de su empresa:</label>
                        <input type="number" name="numero-puerta" placeholder="Ej: 2942" min="1">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el número de su apartamento:</label>
                        <input type="number" name="numero_apartamento" placeholder="Ej: 201" min="1">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la esq. de su empresa:</label>
                        <input type="text" name="esquina" placeholder="Ej: Comandante Braga">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el barrio de su empresa:</label>
                        <input type="text" name="barrio" placeholder="Ej: La Blanqueada">
                    </div> <!-- FIN .campo-formulario  -->
                    <input class="boton" type="submit" name="submit-empresa" value="Registrarme">
                </form> <!-- FIN .cliente-empresa -->

                <form action="../includes/agregar-huerta.php" method="POST" id="huerta-ecologica-formulario" class="huerta-ecologica-formulario ocultar">
                    <div class="campo-formulario ">
                        <label>Ingrese el nombre de su huerta:</label>
                        <input type="text" name="nombre" placeholder="Ej: Los Rosales">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su correo electrónico:</label>
                        <input type="email" name="correo" placeholder="Ej: huerta.verde2022@gmail.com">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su contraseña:</label>
                        <input type="password" name="contraseña" placeholder="Su contraseña">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su teléfono:</label>
                        <input type="number" name="telefono" min="1000" placeholder="Ej: 093921283">
                    </div> <!-- FIN .campo-formulario  -->

                    <!-- <div class="campo-formulario ">
                        <label>Ingrese los mts<sup>2</sup> de su huerta:</label>
                        <input type="number" name="area" placeholder="Ej: 50">
                    </div> FIN .campo-formulario  -->

                    <div class="campo-formulario ">
                        <label>Ingrese la calle de su huerta:</label>
                        <input type="text" name="calle" placeholder="Ej: General Urquiza">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la puerta de su huerta:</label>
                        <input type="number" name="numero-puerta" placeholder="Ej: 2942" min="1">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la esq. de su huerta:</label>
                        <input type="text" name="esquina" placeholder="Ej: Comandante Braga">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el barrio de su huerta:</label>
                        <input type="text" name="barrio" placeholder="Ej: La Blanqueada">
                    </div> <!-- FIN .campo-formulario  -->
                    <input class="boton" type="submit" name="submit-huerta" value="Registrarme">
                </form> <!-- FIN .huerta-ecologica -->
            </div>
            <div class="pie-formulario">
                <a href="inicio-sesion.php">Ya tengo un usuario</a>
                <p>Software made by <a target="_blank" href="https://geatech.vercel.app/">GeaTech</a> &copy; 2022</p>
            </div>
        </div>
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>
    <script src="../javascript/registro.js"></script>
</body>
</html>