<?php session_start();

 if (!isset($_SESSION['correo']) || empty($_SESSION['correo'])) {
  header('location:../../index.php');
}else{

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cambiar contraseña</title>
 <?php  include_once '../links.php'; ?>
</head>
<script type="text/javascript">
  $(document).ready(function() {
    $('password#passwordviejo, password#password1, password2').characterCounter();
});

  function Enviar(){

    
    var txt_pwdold = document.getElementById("passwordviejo").value;
    var  password1= document.getElementById("password1").value;
    var password2 = document.getElementById("password2").value;

    jQuery.ajax({
        type: 'POST',
        url:'../../Controlador/c_actualizarcontrasena.php',
        async: true,
        data:{txt_pwdold:txt_pwdold,password1:password1,password2:password2},
        success:function(respuesta){
          $('.modal').modal();

         $('#resultado').html(respuesta);
            $('#modal1').modal('open');

            document.getElementById("password1").value='';
            document.getElementById("password2").value='';
            document.getElementById("password1").value='';
            document.getElementById("passwordviejo").value='';

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


  <form method="post" >
  <div class="container  teal lighten-5">

      <div class="container-fluid card-panel  teal lighten-2 center-align">
        <div class="row">
            <label style="color: #FFF;"><h5>ACTUALIZAR CONTRASEÑA</h5></label>
          </div>
      </div>
      <div class="container-fluid  center-align ">
      
        <a class="waves-effect waves-light btn-large" href="../index.php" style="width: 40%">Inicio</a>
      </div>

        <div class="container">      <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="passwordviejo" type="password" data-length="50" name="txt_passwordviejo">
            <label for="passwordviejo">Contraseña Actual</label>
          </div>
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
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    </div>
  </div>

  <?php include_once '../footer.php';?>
</body>
</html>
<?php } ?>