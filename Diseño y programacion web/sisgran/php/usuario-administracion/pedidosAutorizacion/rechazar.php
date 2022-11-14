<?php

    include '../../../includes/conexion.php';
    date_default_timezone_set('America/Montevideo');

    $id = $_GET['id'];
    $fechaActual = date('Y-m-d h:i:sa');

    // Autoriza el pedido
    $sql = "UPDATE orden SET Autorizacion = 1 WHERE NroOrden = $id";
    $resultado = mysqli_query($con, $sql);
    
    unset($sql);

    if($resultado==true){
        // Cancela el pedido
        $sql = "INSERT INTO esta (NroOrden, FechaIni, IdEstado) VALUES ('$id', '$fechaActual', 5)";
        $resultado = mysqli_query($con, $sql);
        header("Location: ../administracion.php#pedidos");
    }