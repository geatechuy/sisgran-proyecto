<link rel="stylesheet" href="../../../css/globales.css">
<link rel="stylesheet" href="../administrador.css">

<?php

include '../../../includes/conexion.php';

$id = $_GET['id'];
$sql = "SELECT Correo FROM usuarios WHERE id=$id";
$resultado = mysqli_query($con, $sql);
$fetch = $resultado->fetch_assoc();
$correo = $fetch['Correo'];

?>

<form id="form">
  <h1>Notificar usuario</h1>
  <p>Notificar a <?php echo $correo ?> sobre su nuevo estado de usuario.</p>
  <div class="field">
    <input type="hidden" name="correo" id="correo" required value="<?php echo $correo ?>">
  </div>
  <div class="field">
    <input type="hidden" name="mensaje" id="mensaje" required value="Su usuario ha sido aceptado en el sistema. Intente entrar en él, si usted no logra ingresar por algún motivo contactese con nosotros en la pestaña de contacto de la página web.">
  </div>

  <input type="submit" id="button" value="Enviar correo" class="boton">
</form>

<script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

<script type="text/javascript">
  emailjs.init('zydYFZ6Cl7l8yR4fl')
</script>

<script src="notificar.js"></script>