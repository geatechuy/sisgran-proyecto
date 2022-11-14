<?php

    include '../../../includes/conexion.php';

    $id = $_GET['id'];
?>


<link rel="stylesheet" href="../../../css/globales.css">
<link rel="stylesheet" href="../cuerpo-directivo.css">
<form action="rechazar.php" method="POST" class="siguiente-estado">
    <h2>¿Está seguro que desea rechazar el usuario seleccionado?</h2>
    <div>
        <input type="hidden" name="id" value=<?php echo $id ?>>
        <input type="submit" value="Rechazar" name="rechazar" class="boton">
        <input type="submit" value="Cancelar" name="cancelar" class="boton">
    </div>
</form>

<?php

    if(isset($_POST['rechazar'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM usuarios WHERE id=$id";
        $resultado = mysqli_query($con, $sql);
        $filas = mysqli_fetch_array($resultado);
        
        if(isset($filas)){
            switch($filas['id_cargo']){
                case 5: // Si el usuario es una huerta
                    // Borrar fila en tabla usuarios
                    $sqlUsuarios = "DELETE usuarios FROM usuarios JOIN huerta ON usuarios.Correo=huerta.Correo WHERE usuarios.id=$id";
    
                    $UsuarioCorreo=$filas['Correo']; // Guarda el correo del usuario a borrar antes de que lo borre
                    $borrarUsuario = $con->query($sqlUsuarios);
    
                    if($borrarUsuario==true){
                        // Borrar fila en tabla huerta
                        $sqlHuertas = "DELETE FROM huerta WHERE Correo = '$UsuarioCorreo'";
                        $borrarHuerta = $con->query($sqlHuertas);
                        header("Location: notificarUsuarioRechazado.php?correo=$UsuarioCorreo");
                    }
                break;
    
                case 6: // Si el usuario es un cliente
                    $UsuarioCorreo=$filas['Correo']; // Guarda el correo del usuario a borrar antes de que lo borre

                    // Obtener numero cliente antes de borrar al usuario
                    $sqlNroCliente = "SELECT NroCliente FROM cliente, usuarios WHERE usuarios.id=$id AND cliente.Correo=usuarios.Correo";
                    $resultado = mysqli_query($con, $sqlNroCliente);
                    $fetchResultado = mysqli_fetch_assoc($resultado);
                    $NroCliente = $fetchResultado['NroCliente'];
                    
                    // Borrar fila en tabla usuarios
                    $sqlUsuarios = "DELETE FROM usuarios WHERE id=$id";
                    $borrarUsuario=$con->query($sqlUsuarios);
    
                    if($borrarUsuario==true){
                        // Borrar fila en tabla clientetel
                        $sqlClienteTel = "DELETE FROM clientetel WHERE NroCliente = $NroCliente";
                        $borrarClienteTel=$con->query($sqlClienteTel);
    
                        if($borrarClienteTel==true){
                            // Borrar fila en tabla clienteempresa y clienteweb
    
                            $sqlClienteEmpresa = "DELETE FROM clienteempresa WHERE NroCliente = $NroCliente";
                            $borrarClienteEmpresa=$con->query($sqlClienteEmpresa);
                            
                            $sqlClienteWeb = "DELETE FROM clienteweb WHERE NroCliente = $NroCliente";
                            $borrarClienteWeb=$con->query($sqlClienteWeb);
    
                            if($borrarClienteEmpresa==true OR $borrarClienteWeb==true){
                                $sqlCliente = "DELETE FROM cliente WHERE NroCliente = $NroCliente";
                                $borrarCliente=$con->query($sqlCliente);
                                header("Location: notificarUsuarioRechazado.php?correo=$UsuarioCorreo");
                            }
                        } 
                    }
                break;
    
                default;
                    echo "Error al rechazar la autorización";
                break;
            }
        }
    }

    if(isset($_POST['cancelar'])){
        header("Location: ../administracion.php#pendientes");
    }