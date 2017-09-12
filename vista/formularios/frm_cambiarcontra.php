<?php
/*ssion_start();
$correo=$_SESSION["usuario"];*/
$correo = $_GET["correo"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cambiar contraseña</title>
  <?php include_once '../links.php';?>
</head>
<script type="text/javascript">
  $(document).ready(function() {
    $('password#passwordviejo, password#password1, password2').characterCounter();
  });

function Enviar(){

    var password1= document.getElementById("password1").value;
    var password2 = document.getElementById("password2").value;
    var correo = document.getElementById("correo").value;

    jQuery.ajax({
        type: 'POST',
        url:'../../Controlador/c_cambiarcontrasena.php',
        async: true,
        data:{password1:password1,password2:password2,correo:correo},
        success:function(respuesta){
          $('.modal').modal();

            if (respuesta=="La contraseña se cambio exitosamente") {
            document.getElementById("refe").href="../../index.php";
          }


            $('#resultado').html(respuesta);//no se la activa por que siempre muestra la respuesta
            $('#modal1').modal('open');
        },
        error: function () {
            alert("Error inesperado")
            window.top.location ="../index.html";
        }

    });

}


</script>

</script>
<body>

  <div class="container-fluid card-panel center-align teal lighten-2"><h4>Formulario para cambio de contraseña</h4> </div>
  <form method="post">
    <div class="container  teal lighten-5">

      <div class="container">

        <div class="input-field col s12 m12 l12">
          <input type="email" id="correo" disabled="disabled" data-length="20" name="txt_correo" value=<?php echo "$correo"; ?> />
          <label for="correo">Correo</label>
        </div>

        <div class="input-field col s12 m12 l12">
          <input type="password" id="password1" data-length="20" name="txt_contrasena1"/>
          <label for="password1">Contraseña</label>
        </div>

        <div class="input-field col s12 m12 l12">
          <input type="password" id="password2" data-length="20" name="txt_contrasena2"/>
          <label for="password2">Verificar Contraseña</label>
        </div>

        <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">CAMBIAR CONTRASEÑA
            <i class="material-icons right">send</i>
          </button>
        </div>

      </div>
    </div>
  </form>

   <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mensaje</h4>
      <p id="resultado"></p>
    </div>
    <div class="modal-footer">
      <a  id="refe" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    </div>
  </div>

  <?php include_once '../footer.php';?>
</body>
</html>