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
    <link rel="stylesheet" href="../../css/administrador.css">

    <link rel="shortcut icon" href="../../images/LogoColorHoja.png" type="image/png">
    <title>Sisgran - Administrador</title>
</head>
<body>
    <div class="grid">
        <header class="grid__header">
            <a class="logo" href="#">
                <img class="logo" src="../../images/logoColorHoja.png" alt="Logo Sisgran">
            </a>
            <a href="../../index.php" class="boton cerrar-sesion-boton">Cerrar sesión</a>
        </header>
        <div class="grid__nav">
            <div class="info-usuario">
                <img class="icono-usuario" src="assets/icons/usuario.svg" alt="Icono de usuario">
                <p class="nombre-usuario">Juan Pedro Morales</p>
                <p class="cargo-usuario">Admin</p>
            </div>
            <nav>
                <ul class="navbar">
                    <li class="navbar-item">
                        <a href="#">
                            <img class="item-img" src="assets/icons/huerta.svg" alt="Icono de huertas">
                            <p class="item-nombre">Huertas</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#">
                            <img class="item-img" src="assets/icons/cliente.svg" alt="Icono de clientes">
                            <p class="item-nombre">Clientes</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#">  
                            <img class="item-img" src="assets/icons/catalogos.svg" alt="Icono de catalogo">
                            <p class="item-nombre">Catalogo</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#">
                            <img class="item-img" src="assets/icons/pedido.svg" alt="Icono de pedidos">
                            <p class="item-nombre">Pedidos</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#">
                            <img class="item-img" src="assets/icons/feria.svg" alt="Icono de ventas">
                            <p class="item-nombre">Ventas</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <img class="bg-img" src="assets/vegetales.jpg" alt="Imagen de vegetales">
            <div class="overlay"></div>
        </div>
        <main class="grid__main">
            <h1>CANTIDAD DE ELEMENTOS</h1>
            <div class="elementos">
                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">2</p>
                        <p class="info-nombre">Huertas</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/huerta.svg" alt="Icono de huertas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">71</p>
                        <p class="info-nombre">Clientes</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/cliente.svg" alt="Icono de clientes">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">7</p>
                        <p class="info-nombre">Empresas</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/empresa.svg" alt="Icono de empresas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->
                
                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">9</p>
                        <p class="info-nombre">Pedidos</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/pedido.svg" alt="Icono de pedidos">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->
                
                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">121</p>
                        <p class="info-nombre">Ventas</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="assets/icons/venta.svg" alt="Icono de ventas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->
                
            </div>
        </main>
    </div>
    <script src="../../javascript/pantallaCarga.js"></script>
    <script src="../../javascript/temaNavegador.js"></script>
</body>
</html>