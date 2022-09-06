<!-- Si no es la página principal --> 
<?php if(!$index): ?> 
    <?php switch($css){
        case 'registro':
        case 'inicio-sesion': // Si $css = registro o $css = inicio-sesion ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="../css/normalize.css">
            <link rel="stylesheet" href="../css/globales.css">
            <link rel="stylesheet" href="../css/footer.css">
            <link rel="stylesheet" href="../css/header.css">
            <link rel="stylesheet" href="../css/<?php echo $css ?>.css">
            <script src="https://kit.fontawesome.com/4ac277a656.js" crossorigin="anonymous"></script>
            <title><?php echo $titulo ?></title>
            </head>
        <?php break;
        case 'contacto':
        case 'tienda':
        case 'sobre-nosotros': // Si $css = contacto o $css = tienda o $css = sobre-nosotros ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="../css/normalize.css">
            <link rel="stylesheet" href="../css/globales.css">
            <link rel="stylesheet" href="../css/footer.css">
            <link rel="stylesheet" href="../css/header.css">
            <link rel="stylesheet" href="../css/<?php echo $css ?>.css">
            <script src="https://kit.fontawesome.com/4ac277a656.js" crossorigin="anonymous"></script>
            <title><?php echo $titulo ?></title>
            </head>
            <body id="body">
            <header class="cabecera">
                <a href="../index.php"><img class="logo" src="../images/LogoColorHoja.png" alt="Logo Sisgran"></a>
                <nav>
                    <ul class="navegacion">
                        <li> <a class="navegacion-enlace" href="../index.php">Inicio</a> </li>
                        <li> <a class="navegacion-enlace <?php if($css === "tienda") echo 'activo'?>" href="tienda.php">Tienda</a> </li>
                        <li> <a class="navegacion-enlace <?php if($css === "contacto") echo 'activo'?>" href="contacto.php">Contacto</a> </li>
                        <li> <a class="navegacion-enlace <?php if($css === "sobre-nosotros") echo 'activo'?>" href="sobre-nosotros.php">Sobre nosotros</a> </li>
                    </ul>
                </nav>
                <?php if($css != "tienda"){ ?> 
                <div class="inicio-sesion-registro">
                    <a class="boton inicio-sesion" href="inicio-sesion.php">Iniciar sesión</a>
                    <a class="boton registro" href="registro.php">Registrarse</a>
                </div>
                <?php }else{ ?>
                <div class="carrito-cerrar-sesion">
                    <i id="carrito-icono" class="carrito-icono fa-solid fa-cart-shopping"></i>
                    <a id ="cerrar-sesion" class="boton cerrar-sesion-boton" href="../index.php">Cerrar sesión</a>
                </div>
                <?php } ?>
            </header>
        <?php break;
    }?>

<!-- Si es la página principal -->
<?php else: ?> 
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/globales.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/<?php echo $css ?>.css">
    <script src="https://kit.fontawesome.com/4ac277a656.js" crossorigin="anonymous"></script>
    <title><?php echo $titulo ?></title>
    </head>
    <body id="body">
    <header class="cabecera">
        <a href="./index.php"><img class="logo" src="./images/LogoColorHoja.png" alt="Logo Sisgran"></a>
        <nav>
            <ul class="navegacion">
                <li> <a class="navegacion-enlace activo" href="index.php">Inicio</a> </li>
                <li> <a class="navegacion-enlace" href="php/tienda.php">Tienda</a> </li>
                <li> <a class="navegacion-enlace" href="php/contacto.php">Contacto</a> </li>
                <li> <a class="navegacion-enlace" href="php/sobre-nosotros.php">Sobre nosotros</a> </li>
            </ul>
        </nav>
        <div class="inicio-sesion-registro">
            <a class="boton inicio-sesion" href="php/inicio-sesion.php">Iniciar sesión</a>
            <a class="boton registro" href="php/registro.php">Registrarse</a>
        </div>
    </header>
<?php endif ?>