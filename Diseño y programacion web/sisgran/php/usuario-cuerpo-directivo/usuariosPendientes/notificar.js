const btn = document.getElementById('button');

document.getElementById('form')
 .addEventListener('submit', function(event) {
   event.preventDefault();

   btn.value = 'Enviando...';

   const serviceID = 'default_service';
   const templateID = 'template_nclp3tt';

   emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'Enviar correo';
      alert('Enviado!');
      window.location.href = "../cuerpo-directivo.php#validarClientes";
    }, (err) => {
        btn.value = 'Enviar correo';
        alert(JSON.stringify(err));
        window.location.href = "../cuerpo-directivo.php#validarClientes";
    });
});