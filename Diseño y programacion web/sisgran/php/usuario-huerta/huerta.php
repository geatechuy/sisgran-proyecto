<?php 

include '../../includes/conexion.php' ;

    session_start();
    $idHuerta = $_SESSION['IdHuerta'];

    $base=1;
    if(isset($_GET['base'])){
        $base = $_GET['base'];
    }

?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="huerta.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/4ac277a656.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../../images/LogoColorHoja.png" type="image/png">

    <title>Sisgran | Huerta</title>
</head>
<body>
    <div class="grid">
        <header class="grid__header">
            <a class="logo" href="#">
                <img class="logo" src="../../images/logoColorHoja.png" alt="Logo Sisgran">
            </a>
            <a href="../../includes/cerrar-sesion.php" class="boton cerrar-sesion-boton">Cerrar sesión</a>
        </header>
        <div class="grid__nav">
            <div class="info-usuario">
                <img class="icono-usuario" src="../usuario-administracion/assets/icons/usuario.svg" alt="Icono de usuario">
                <p class="nombre-usuario"><?php echo $_SESSION['NombreHuerta'] ?></p>
            </div>
            <nav>
                <ul class="navbar">
                    <li class="navbar-item">
                        <a href="#seleccionarCultivos" id="seleccionar">
                            <img class="item-img" src="../usuario-administracion/assets/icons/huerta.svg" alt="Icono de huertas">
                            <p class="item-nombre">Seleccionar cultivos</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#estadosCultivos" id="estados">
                            <img class="item-img" src="../usuario-administracion/assets/icons/huerta.svg" alt="Icono de huertas">
                            <p class="item-nombre">Estados de cultivos</p>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="#produccionCultivo" id="produccion">
                            <img class="item-img" src="../usuario-administracion/assets/icons/huerta.svg" alt="Icono de huertas">
                            <p class="item-nombre">Producción por cultivo</p>
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
                            $sql = "SELECT COUNT(IdHuerta) as cultivos FROM produce WHERE IdHuerta=$idHuerta && Estado_Post=1";
                            $resultado = mysqli_query($con, $sql);
                            $cultivos = $resultado->fetch_assoc();
                            echo $cultivos['cultivos'];
                            ?>
                        </p>
                        <p class="info-nombre">Cantidad de cultivos</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="iconos/Cantidad.svg" alt="Icono de huertas">
                        </div>
                    </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(Estado) as cultivos FROM produce WHERE IdHuerta=$idHuerta && Estado = 'Sembrar' && Estado_Post=1";
                            $resultado = mysqli_query($con, $sql);
                            $cultivos = $resultado->fetch_assoc();
                            echo $cultivos['cultivos'];
                            ?>
                        </p>
                        <p class="info-nombre">Cultivos sembrando</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="iconos/Sembrando.svg" alt="Icono de huertas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(Estado) as cultivos FROM produce WHERE IdHuerta=$idHuerta && Estado = 'Germinar' && Estado_Post=1";
                            $resultado = mysqli_query($con, $sql);
                            $cultivos = $resultado->fetch_assoc();
                            echo $cultivos['cultivos'];
                            ?>
                        </p>
                        <p class="info-nombre">Cultivos germinando</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="iconos/Germinando.svg" alt="Icono de huertas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(Estado) as cultivos FROM produce WHERE IdHuerta=$idHuerta && Estado = 'Trasplantar' && Estado_Post=1";
                            $resultado = mysqli_query($con, $sql);
                            $cultivos = $resultado->fetch_assoc();
                            echo $cultivos['cultivos'];
                            ?>
                        </p>
                        <p class="info-nombre">Cultivos trasplantando</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="iconos/Transplantando.svg" alt="Icono de huertas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(Estado) as cultivos FROM produce WHERE IdHuerta=$idHuerta && Estado = 'Cosechar' && Estado_Post=1";
                            $resultado = mysqli_query($con, $sql);
                            $cultivos = $resultado->fetch_assoc();
                            echo $cultivos['cultivos'];
                            ?>
                        </p>
                        <p class="info-nombre">Cultivos para cosechar</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="../usuario-administracion/assets/icons/huerta.svg" alt="Icono de huertas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->

                <div class="elemento">
                    <div class="elemento-info">
                        <p class="info-numero">
                            <?php
                            $sql = "SELECT COUNT(Estado) as cultivos FROM produce WHERE IdHuerta=$idHuerta && Estado = 'Cosechar' && Estado_Post=0";
                            $resultado = mysqli_query($con, $sql);
                            $cultivos = $resultado->fetch_assoc();
                            echo $cultivos['cultivos'];
                            ?>
                        </p>
                        <p class="info-nombre">Cosechas</p>
                    </div>
                    <div class="elemento-icono">
                        <img src="../usuario-administracion/assets/icons/huerta.svg" alt="Icono de huertas">
                    </div>
                </div>
                <!-- FIN ELEMENTO -->
            </div>
            <div id="seleccionarCultivos" class="elemento_mostrado">
                <h3>Ingresar cultivos</h3>
                <form class="seleccion-cultivo" action="variedad_cantidad.php?huerta=<?php echo $idHuerta ?>" method="POST">
                    <fieldset>
                        <label for="cultivoBase">Seleccione un cultivo base: </label>
                        <select name="cultivoBase" id="cultivoBase" class="selectCultivos">
                        <?php
                            $sql = "SELECT IdVegetal FROM `calendario` WHERE (Month(CURRENT_DATE) >= SiembraInicio_Mes AND Month(CURRENT_DATE) <= SiembraFin_Mes) OR Month(CURRENT_DATE)=SiembraInicio_Mes";
                            $resultado = mysqli_query($con, $sql);

                            while($filas = mysqli_fetch_assoc($resultado)){
                                $idVegetalNombre = $filas['IdVegetal'];
                                $sqlNombre = "SELECT Nombre FROM vegetal WHERE IdVegetal = $idVegetalNombre";
                                $resultadoNombre = mysqli_query($con, $sqlNombre);
                                $nombreVegetal = $resultadoNombre->fetch_assoc();
                                echo "<option value='" . $filas['IdVegetal'] . "'>" . $nombreVegetal['Nombre'] . "</option>";
                            }
                        ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="cultivoAsociado">Seleccione un cultivo asociado: </label>
                        <select name="cultivoAsociado" id="cultivoAsociado">
                            <option value="0">Sin asociado</option>
                        <?php
                            $sql = "SELECT IdVegetalAsociado FROM asocia WHERE IdVegetalPrincipal=$base";
                            $resultado = mysqli_query($con, $sql);
                            
                            $asociado = [];
                            $i = 0;
                            while($filas = mysqli_fetch_assoc($resultado)){
                                $asociado[$i] = $filas['IdVegetalAsociado'];
                                $i++;
                            }

                            for($j = 0; $j<$i; $j++){
                                $sql = "SELECT * FROM vegetal WHERE IdVegetal=$asociado[$j]";
                                $resultado = mysqli_query($con, $sql);

                                while($filas = mysqli_fetch_assoc($resultado)){
                                    echo "<option value='" . $filas['IdVegetal'] . "'>" . $filas['Nombre'] . "</option>";
                                }
                            }
                        ?>
                        </select>
                    </fieldset>
                    <input type="submit" value="Enviar" name="enviar" class="boton">
                    <p class="resultado"></p>
                </form>
            </div>
            <div id="estadosCultivos" class="elemento_mostrado">    
                <h3 class="titulo-tabla">Estados de cultivos</h3>
                <table>
                        <tr>
                            <th>Vegetal</th>
                            <th>Variedad</th>
                            <th>Cantidad</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    <?php 
                                
                        $sql = "SELECT vegetal.IdVegetal, vegetal.Nombre, variedad.NombreVariedad, produce.Cantidad, produce.Fecha, produce.Estado FROM produce, vegetal, variedad WHERE produce.IdVegetal = vegetal.IdVegetal AND produce.IdVariedad = variedad.IdVariedad AND produce.IdHuerta=$idHuerta AND produce.Estado_Post=1 ORDER BY Fecha";
                        $resultado = mysqli_query($con, $sql);

                        while($fila = mysqli_fetch_assoc($resultado)){
                            $fecha = $fila['Fecha'];
                            ?>
                            
                            <tr>
                                <td><?php echo $fila['Nombre'] ?></td>
                                <td><?php echo $fila['NombreVariedad'] ?></td>
                                <td><?php echo $fila['Cantidad'] ?></td>
                                <td><?php echo $fila['Fecha'] ?></td>
                                <td class="fecha-fin"><?php
                                    $idVegetalFin = $fila['IdVegetal'];
                                    switch($fila['Estado']){
                                        case 'Sembrar':
                                            $sqlFechaFin = "SELECT Germinación_días FROM calendario, vegetal WHERE calendario.Idvegetal=$idVegetalFin AND calendario.IdVegetal=vegetal.IdVegetal";
                                            $resultadoFin = mysqli_query($con, $sqlFechaFin);
                                            $fechaFin = $resultadoFin->fetch_assoc();
                                            $stringSeparado = explode(' ', $fila['Fecha']);
                                            echo date("Y-m-d",strtotime($stringSeparado[0]."+ ". $fechaFin['Germinación_días'] ." days")) . " " . $stringSeparado[1]; 
                                        break;
                                        case 'Germinar':
                                            $sqlFechaFin = "SELECT TTrasplantar_días FROM calendario, vegetal WHERE calendario.Idvegetal=$idVegetalFin AND calendario.IdVegetal=vegetal.IdVegetal";
                                            $resultadoFin = mysqli_query($con, $sqlFechaFin);
                                            $fechaFin = $resultadoFin->fetch_assoc();
                                            $stringSeparado = explode(' ', $fila['Fecha']);
                                            echo date("Y-m-d",strtotime($stringSeparado[0]."+ ". $fechaFin['TTrasplantar_días'] ." days")) . " " . $stringSeparado[1]; 
                                        break;
                                        case 'Trasplantar':
                                            $sqlFechaFin = "SELECT TiempoCosechar_días FROM calendario, vegetal WHERE calendario.Idvegetal=$idVegetalFin AND calendario.IdVegetal=vegetal.IdVegetal";
                                            $resultadoFin = mysqli_query($con, $sqlFechaFin);
                                            $fechaFin = $resultadoFin->fetch_assoc();
                                            $stringSeparado = explode(' ', $fila['Fecha']);
                                            echo date("Y-m-d",strtotime($stringSeparado[0]."+ ". $fechaFin['TiempoCosechar_días'] ." days")) . " " . $stringSeparado[1]; 
                                        break;
                                        case 'Cosechar':
                                            echo $fila['Fecha'];
                                        break;
                                    }
                                ?></td>
                                <td><?php echo $fila['Estado'] ?></td>
                                <td>
                                    <a class="boton boton-siguiente" href="estados/siguiente.php?huerta=<?php echo $idHuerta?>&vegetal=<?php echo $fila['Nombre']  ?>&variedad=<?php echo $fila['NombreVariedad']  ?>&cant=<?php echo $fila['Cantidad']  ?>&fecha=<?php echo $fila['Fecha']  ?>&estado=<?php echo $fila['Estado'] ?>">Siguiente estado</a>
                                </td>
                            </tr>
                    <?php } ?>
                </table>
            </div>
            <div id="produccionCultivo" class="elemento_mostrado">
                <h3 class="titulo-tabla">Producción por cultivos</h3>
                <table>
                    <tr>
                        <th>Vegetal</th>
                        <th>Variedad</th>
                        <th>Cantidad cosechada</th>
                        <th>Unidad</th>
                        <th>Veces sembrado</th>
                    </tr>                    

                <?php

                $sqlProduccion = "SELECT produce.IdVegetal, produce.IdVariedad, SUM(DISTINCT cosecha.cantidad) as Cantidad FROM produce, cosecha WHERE produce.IdHuerta=$idHuerta &&  produce.IdHuerta=cosecha.IdHuerta && produce.IdVegetal=cosecha.IdVegetal && produce.IdVariedad=cosecha.IdVariedad && produce.Estado_Post = 0 && produce.Estado='Cosechar' GROUP BY IdVariedad";
                $resultadoProduccion = mysqli_query($con, $sqlProduccion);

                while($fila = mysqli_fetch_assoc($resultadoProduccion)){ 
                    $vegetal = $fila['IdVegetal'];
                    $variedad = $fila['IdVariedad'];

                    $sqlCultivo = "SELECT Nombre, NombreVariedad from vegetal, variedad WHERE vegetal.IdVegetal=$vegetal && variedad.IdVariedad=$variedad";
                    $resultadoCultivo = mysqli_query($con, $sqlCultivo);
                    $cultivo = $resultadoCultivo->fetch_assoc();
                ?>

                <tr>
                    <td><?php echo $cultivo['Nombre'] ?></td>
                    <td><?php echo $cultivo['NombreVariedad'] ?></td>
                    <td><?php echo $fila['Cantidad'] ?></td>
                    <td>
                        <?php 
                        $sql = "SELECT IdUnidad FROM variedad WHERE IdVariedad=$variedad";
                        $resultado = mysqli_query($con, $sql);
                        $unidad=$resultado->fetch_assoc();
                        switch($unidad['IdUnidad']){
                            case 1: echo 'Kg'; break;
                            case 2: echo 'Atado'; break;
                            case 3: echo 'Unidad'; break;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $sqlVeces = "SELECT COUNT(IdVariedad) as Veces FROM cosecha WHERE IdHuerta=1 && IdVegetal=$vegetal && IdVariedad=$variedad";
                        $resultadoVeces = mysqli_query($con, $sqlVeces);
                        $veces = $resultadoVeces->fetch_assoc();
                        echo $veces['Veces'];
                        ?>
                    </td>
                </tr>

                <?php } ?>
                </table>
            </div>
        </main>
    </div>
    <script src="huerta.js"></script>
</body>
</html>