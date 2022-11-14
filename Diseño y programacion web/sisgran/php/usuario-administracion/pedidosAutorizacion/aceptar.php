<?php

    include '../../../includes/conexion.php';
    date_default_timezone_set('America/Montevideo');

    $id = $_GET['id'];
    $fechaActual = date('Y-m-d h:i:sa');
    $arrayExistencia = []; // Array para checkear si tengo stock para todos los productos
    $i = 0; // Contador para el while
    $sqlUpdateStock = array();

    // Trae datos de pedido
    $sqlSelectPide = "SELECT IdVegetal, IdVariedad, Cant FROM pide WHERE NroOrden=$id";
    $resultadoSelectPide = mysqli_query($con, $sqlSelectPide);

    while($fila = mysqli_fetch_assoc($resultadoSelectPide)){
        $cantRestada = 0;

        $idvegetal = $fila['IdVegetal'];
        $idvariedad = $fila['IdVariedad'];
        $cantidad = $fila['Cant'];

        $sqlSelectStock = "SELECT CantActual FROM stock WHERE IdVegetal=$idvegetal && IdVariedad=$idvariedad";
        $resultadoSelectStock = mysqli_query($con, $sqlSelectStock);
        $stock = $resultadoSelectStock->fetch_assoc();
        $stockCant = $stock['CantActual'];
        
        $cantRestada = $stockCant - $cantidad; // Resta al stock la cantidad que compra

        if($cantRestada < 0){ // Si la resta de negativo
            array_push($arrayExistencia, 0); // Si NO hay stock para esa variedad se agregar un 0 al array
        }else{
            array_push($arrayExistencia, 1); // Si hay stock para esa variedad se agregar un 1 al array
        }

        $sqlUpdateStock[$i] = "UPDATE stock SET CantActual=$cantRestada WHERE IdVegetal=$idvegetal && IdVariedad=$idvariedad";
        $i++;
    }
    
    if(in_array(0, $arrayExistencia)){ // Si el array contiene un 0
        header("Location: ../stock.php");
        exit; // En caso de que header no funcione corta el proceso
    }else{ // Si el array no ningún tiene 0
        // Autoriza el pedido
        $sql = "UPDATE orden SET Autorizacion = 1 WHERE NroOrden = $id";
        $resultado = mysqli_query($con, $sql);

        // Ingresa estado Armado al pedido
        $sqlEsta = "INSERT INTO esta (NroOrden, FechaIni, IdEstado) VALUES ('$id', '$fechaActual', 2)";
        $resultadoEsta = mysqli_query($con, $sqlEsta);

        // Actualiza el stock
        for($j = 0; $j < count($sqlUpdateStock); $j++){
            echo $sqlUpdateStock[$j];
            $resultadoUpdateStock = mysqli_query($con, $sqlUpdateStock[$j]);
        }

        if($resultadoUpdateStock==true){ // Si actualizar el stock no da error
            header("Location: ../administracion.php#pedidos");
        }
    }
?>