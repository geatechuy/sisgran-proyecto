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
                
            <form action="funciones.php" id="cliente-web-formulario" class="cliente-web-formulario">
                    <div class="campo-formulario campo-radio">
                        <input class="radio" type="radio" name="documento" id="ci" value="1" checked="checked">
                        <label>Cédula de identidad</label>
                        <input class="radio" type="radio" name="documento" id="pasaporte" value="2">
                        <label>Pasaporte</label>
                    </div> <!-- FIN .campo-formulario -->
                    <div class="campo-formulario ci">
                        <label>Ingrese su cédula de identidad:</label>
                        <input type="number" placeholder="Ej: 58217530">
                    </div> <!-- FIN .campo-formulario .ci -->
                    <div class="campo-formulario pasaporte ocultar">
                        <label>Ingrese su pasaporte:</label>
                        <div>
                            <select>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                <option value="6">F</option>
                                <option value="7">G</option>
                                <option value="8">H</option>
                                <option value="9">I</option>
                                <option value="10">J</option>
                                <option value="11">K</option>
                                <option value="12">L</option>
                                <option value="13">M</option>
                                <option value="14">N</option>
                                <option value="15">O</option>
                                <option value="16">P</option>
                                <option value="17">Q</option>
                                <option value="18">R</option>
                                <option value="19">S</option>
                                <option value="20">T</option>
                                <option value="21">U</option>
                                <option value="22">V</option>
                                <option value="23">W</option>
                                <option value="24">X</option>
                                <option value="25">Y</option>
                                <option value="26">Z</option>
                            </select>
                            <input type="number" placeholder="Ej: 677233">
                        </div>
                    </div> <!-- FIN .campo-formulario .pasaporte -->
                    <div class="campo-formulario ">
                        <label>Ingrese su correo electrónico:</label>
                        <input type="email" name="correo" placeholder="Ej: juan.rodriguez@gmail.com">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su contraseña:</label>
                        <input type="password" name="contraseña" placeholder="Su contraseña">
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
                        <input type="tel" name="telefono" placeholder="Ej: 093921283">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la calle de su hogar:</label>
                        <input type="text" name="calle" placeholder="Ej: General Urquiza">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la puerta de su hogar:</label>
                        <input type="number" name="numero-puerta" placeholder="Ej: 2942">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el número de su apartamento:</label>
                        <input type="number" name="numero-apartamento" placeholder="Ej: 201">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la esq. de su hogar:</label>
                        <input type="text" name="esquina" placeholder="Ej: Comandante Braga">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el barrio de su hogar:</label>
                        <input type="text" name="barrio" placeholder="Ej: La Blanqueada">
                    </div> <!-- FIN .campo-formulario  -->
                    <input class="boton" type="submit"  value="Registrarme">
                </form> <!-- FIN .cliente-web -->

                <form action="funciones.php" method="POST" id="cliente-empresa-formulario" class="cliente-empresa-formulario ocultar">
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
                        <input type="number" name="rut" placeholder="Ej: 30686957">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese su teléfono:</label>
                        <input type="tel" name="telefono" placeholder="Ej: 093921283">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la calle de su empresa:</label>
                        <input type="text" name="calle" placeholder="Ej: General Urquiza">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la puerta de su empresa:</label>
                        <input type="number" name="numero-puerta" placeholder="Ej: 2942">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el número de su apartamento:</label>
                        <input type="number" name="numero_apartamento" placeholder="Ej: 201">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la esq. de su empresa:</label>
                        <input type="text" name="esquina" placeholder="Ej: Comandante Braga">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el barrio de su empresa:</label>
                        <input type="text" name="barrio" placeholder="Ej: La Blanqueada">
                    </div> <!-- FIN .campo-formulario  -->
                    <input class="boton" type="submit"  value="Registrarme">
                </form> <!-- FIN .cliente-empresa -->

                <form action="funciones.php" id="huerta-ecologica-formulario" class="huerta-ecologica-formulario ocultar">
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
                        <input type="tel" name="télefono" placeholder="Ej: 093921283">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese los mts<sup>2</sup> de su huerta:</label>
                        <input type="number" name="area" placeholder="Ej: 50">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la calle de su huerta:</label>
                        <input type="text" name="calle" placeholder="Ej: General Urquiza">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la puerta de su huerta:</label>
                        <input type="number" name="numero-puerta" placeholder="Ej: 2942">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese la esq. de su huerta:</label>
                        <input type="text" name="esquina" placeholder="Ej: Comandante Braga">
                    </div> <!-- FIN .campo-formulario  -->
                    <div class="campo-formulario ">
                        <label>Ingrese el barrio de su huerta:</label>
                        <input type="text" name="barrio" placeholder="Ej: La Blanqueada">
                    </div> <!-- FIN .campo-formulario  -->
                    <input class="boton" type="submit"  value="Registrarme">
                </form> <!-- FIN .huerta-ecologica -->
            </form> <!-- FIN .formulario -->

            
             

        </div>
        <div class="pie-formulario">
            <a href="inicio-sesion.php">Ya tengo un usuario</a>
            <p>Software made by <a target="_blank" href="https://geatech.vercel.app/">GeaTech</a> &copy; 2022</p>
        </div>
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>
    <script src="../javascript/registro.js"></script>
</body>
</html>