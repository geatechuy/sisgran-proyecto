<!-- GOOGLE FONTS -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- NUESTRO CSS -->
<link rel="stylesheet" href="../../css/globales.css">
<link rel="stylesheet" href="cuerpo-directivo.css">

<!-- PRODUCCIÓN POR CULTIVOS -->
<div class="elemento_mostrado" style="display: flex;">
    <h3 class="titulo-tabla">Producción por cultivos</h3>
    <table>
        <tr>
            <th>Vegetal</th>
            <th>Variedad</th>
            <th>Cantidad cosechada</th>
            <th>Unidad</th>
        </tr>                    

        <?php

        include '../../includes/conexion.php'; 

        $idHuerta = $_GET['huerta'];

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
                $variedad=$resultado->fetch_assoc();
                switch($variedad['IdUnidad']){
                    case 1: echo 'Kg'; break;
                    case 2: echo 'Atado'; break;
                    case 3: echo 'Unidad'; break;
                }
                ?>
            </td>
        </tr>

        <?php } ?>
    </table>
</div>

<div class="div-boton">
    <a class="boton" href="cuerpo-directivo.php#infoHuertas">Volver</a>
</div>