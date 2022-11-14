<link rel="stylesheet" href="../../../css/globales.css">
<link rel="stylesheet" href="../cuerpo-directivo.css">

<?php

include '../../../includes/conexion.php';

$correo = $_GET['correo'];

?>

<form id="form">
  <h1>Notificar usuario</h1>
  <p>Notificar a <?php echo $correo ?> sobre su nuevo estado de usuario.</p>
  <div class="field">
    <input type="hidden" name="correo" id="correo" required value="<?php echo $correo ?>">
  </div>
  <div class="field">
    <input type="hidden" name="mensaje" id="mensaje" required value="Su usuario ha sido rechazado del sistema, si usted cree que estamos equivocados en nuestra decisión comuniquese con nosotros en la ventana de contacto del sitio web.">
  </div>

  <input type="submit" id="button" value="Enviar correo" class="boton">
</form>

<script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

<script type="text/javascript">
  emailjs.init('zydYFZ6Cl7l8yR4fl')
</script>

<script src="notificar.js"></script>