<?php
    require '../includes/funciones.php';

    $archivo = "head";
    $css = "inicio-sesion";
    $titulo = "Sisgran - Inicio de sesión";
    $index = false;
    incluirArchivo($archivo, $css, $titulo, $index);
    conexionBD($servidor, $usuario, $contraseña, $baseDatos);
   
?>
<body id="body">
    <main class="contenedor">
        <div class="contenedor-formulario">
            <i onclick="history.back()" class="pagina-anterior fa-solid fa-arrow-left"></i>
            <div class="cabecera-formulario">
                <a href="../index.php"><img class="logo" src="../images/LogoColor.png" alt="Logo Sisgran"></a> 
                <p class="titulo">Incio de sesión</p>
            </div>
            <form  class="formulario" method="POST">
                <div class="campo-formulario ">
                    <label>Ingrese su correo electrónico: </label>
                    <input type="text" name="correo" placeholder="Su correo" required>
                </div>
                <div class="campo-formulario ">
                    <label>Ingrese su contraseña: </label>
                    <input type="password" name="contraseña" placeholder="Su contraseña" required>
                </div>
                <input class="boton" name="iniciar-sesion" type="submit" value="Iniciar sesión">
            </form>
            <?php
            if (isset($_POST['iniciar-sesion'])){
                $correo=$_POST['correo'];
                $contraseñaUsuario=$_POST['contraseña'];
                comprobarLogin($servidor, $usuario, $contraseña, $baseDatos, $correo, $contraseñaUsuario);
            }
            ?>
            <div class="pie-formulario">
                <p>Si aún no está registrado como usuario haga <a href="registro.php">click aquí</a></p>
                <p>Software made by <a target="_blank" href="https://geatech.vercel.app/">GeaTech</a> &copy; 2022</p>
            </div>
        </div>
        <div class="contenedor-imagen"></div>
    </main>
    <script src="../javascript/pantallaCarga.js"></script>
    <script src="../javascript/temaNavegador.js"></script>
</body>
</html>