<?php 

include '../../includes/conexion.php'; 

session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- NUESTRO CSS -->
    <link rel="stylesheet" href="../../css/globales.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="informatico.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/4ac277a656.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Informático</title>
</head>
<body>
    <div class="grid">
    <header class="grid__header">
            <a class="logo" href="#">
                <img class="logo" src="../../images/logoColorHoja.png" alt="Logo Sisgran">
            </a>
            <p class="nombre-usuario">Bienvenido a Sisgran, <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></p>
            <a href="../../includes/cerrar-sesion.php" class="boton cerrar-sesion-boton">Cerrar sesión</a>
        </header>
        <div class="grid__nav">
            <div class="info-usuario">
                <img class="icono-usuario" src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de usuario">
                <p class="nombre-usuario"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></p>
            </div>
            <nav>
                <ul class="navbar">
                    <li class="navbar-item">
                        <a href="#informaticos" id="informaticos">
                            <img class="item-img" src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de huertas">
                            <p class="item-nombre">Usuarios informaticos</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#administradores" id="administradores">
                            <img class="item-img" src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de huertas">
                            <p class="item-nombre">Usuarios admin</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#directores" id="directores">
                            <img class="item-img" src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de huertas">
                            <p class="item-nombre">Usuarios directores</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <img class="bg-img" src="../usuario-administracion/assets/vegetales.jpg" alt="Imagen de vegetales">
            <div class="overlay"></div>
        </div>
        <main class="grid__main">
            <h1>CANTIDAD DE ELEMENTOS</h1>
            <div class="elementos">
                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(id) as Usuarios FROM usuarios WHERE id_cargo=1 && Estado=2";
                            $resultado = mysqli_query($con, $sql);
                            $usuarios = $resultado->fetch_assoc();
                            echo $usuarios['Usuarios'];
                            ?>
                        </p>
                        <p class="info-nombre">Usuarios informáticos</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de usuarios">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(id) as Usuarios FROM usuarios WHERE id_cargo=3 && Estado=2";
                            $resultado = mysqli_query($con, $sql);
                            $usuarios = $resultado->fetch_assoc();
                            echo $usuarios['Usuarios'];
                            ?>
                        </p>
                        <p class="info-nombre">Usuarios administradores</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de usuarios">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(id) as Usuarios FROM usuarios WHERE id_cargo=2 && Estado=2";
                            $resultado = mysqli_query($con, $sql);
                            $usuarios = $resultado->fetch_assoc();
                            echo $usuarios['Usuarios'];
                            ?>
                        </p>
                        <p class="info-nombre">Usuarios directores</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de usuarios">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->
            </div>
            <div id="informatico" class="elemento_mostrado">
                <h3 class="titulo-tabla">Informáticos</h3>
                <a href="agregar/informaticos.php" class="boton">Agregar informáticos</a>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th></th>
                    </tr>
                    <?php 
                    
                    $sql = "SELECT * FROM usuarios WHERE id_cargo=1 && Estado=2";
                    $resultado = mysqli_query($con, $sql);
                    while($filas = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $filas['id'] ?></td>
                            <td><?php echo $filas['nombre'] ?></td>
                            <td><?php echo $filas['apellido'] ?></td>
                            <td><?php echo $filas['Correo'] ?></td>
                            <td>
                                <a href="borrar/informaticos.php?id=<?php echo $filas['id'] ?>" class="utilidadTabla"><i class="fa-solid fa-trash"></i></a>
                                <a href="modificar/informaticos.php?id=<?php echo $filas['id'] ?>"class="utilidadTabla"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php } ?>                    
                </table>
            </div>
            <div id="administrador" class="elemento_mostrado">
                <h3 class="titulo-tabla">Administradores</h3>
                <a href="agregar/administradores.php" class="boton">Agregar administradores</a>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th></th>
                    </tr>
                    <?php 
                    
                    $sql = "SELECT * FROM usuarios WHERE id_cargo=3 && Estado=2";
                    $resultado = mysqli_query($con, $sql);
                    while($filas = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $filas['id'] ?></td>
                            <td><?php echo $filas['nombre'] ?></td>
                            <td><?php echo $filas['apellido'] ?></td>
                            <td><?php echo $filas['Correo'] ?></td>
                            <td>
                                <a href="borrar/administradores.php?id=<?php echo $filas['id'] ?>" class="utilidadTabla"><i class="fa-solid fa-trash"></i></a>
                                <a href="modificar/administradores.php?id=<?php echo $filas['id'] ?>"class="utilidadTabla"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php } ?>                    
                </table>
            </div>
            <div id="director" class="elemento_mostrado">
                <h3 class="titulo-tabla">Directores</h3>
                <a href="agregar/directores.php" class="boton">Agregar directores</a>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th></th>
                    </tr>
                    <?php 
                    
                    $sql = "SELECT * FROM usuarios WHERE id_cargo=2 && Estado=2";
                    $resultado = mysqli_query($con, $sql);
                    while($filas = mysqli_fetch_assoc($resultado)){?>
                        <tr>
                            <td><?php echo $filas['id'] ?></td>
                            <td><?php echo $filas['nombre'] ?></td>
                            <td><?php echo $filas['apellido'] ?></td>
                            <td><?php echo $filas['Correo'] ?></td>
                            <td>
                                <a href="borrar/directores.php?id=<?php echo $filas['id'] ?>" class="utilidadTabla"><i class="fa-solid fa-trash"></i></a>
                                <a href="modificar/directores.php?id=<?php echo $filas['id'] ?>"class="utilidadTabla"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php } ?>                    
                </table>
            </div>
        </main>
    </div>
    <script src="../../javascript/pantallaCarga.js"></script>
    <script src="../../javascript/temaNavegador.js"></script>
    <script src="informatico.js"></script>
</body>
</html>