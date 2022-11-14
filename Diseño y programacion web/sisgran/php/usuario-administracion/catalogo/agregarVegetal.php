<?php 

    include '../../../includes/conexion.php';

    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];

        $sql = "SELECT IdVegetal FROM vegetal ORDER BY IdVegetal DESC LIMIT 1";
        $resultado = mysqli_query($con, $sql);
        $fetch = $resultado->fetch_assoc();
        $id = $fetch['IdVegetal'] + 1;

        $sql = "INSERT INTO vegetal (IdVegetal, Nombre) VALUES ('$id','$nombre')";
        $resultado = mysqli_query($con, $sql);
        header("Location: ../administracion.php");
    }