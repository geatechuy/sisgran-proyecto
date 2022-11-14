<?php

    include '../../../includes/conexion.php';
    date_default_timezone_set('America/Montevideo');

    $id = $_GET['orden'];
    $fechaini = $_GET['fechaini'];
    $fechaActual = date('Y-m-d h:i:sa');

    // Le pongo fecha fin al estado de no entregado
    $sqlUpdate = "UPDATE esta SET FechaFin='$fechaActual' WHERE NroOrden='$id' && FechaIni='$fechaini'";
    $resultado = mysqli_query($con, $sqlUpdate);

    if($resultado==true){
        // Ingresa estado Armado al pedido
        $sqlEsta = "INSERT INTO esta (NroOrden, FechaIni, IdEstado) VALUES ('$id', '$fechaActual', 2)";
        $resultadoEsta = mysqli_query($con, $sqlEsta);
        
        if($resultadoEsta==true){
            header("Location: ../administracion.php#pedidos");
        }else{
            echo "ERROR AL CAMBIAR DE ESTADO NO ENTREGADO A ARMADO";
        }
    }