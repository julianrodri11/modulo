
<?session_start();
require_once '../../Modelo/Conexion.php';
require_once '../../Modelo/m_consultas.php';
require_once '../../Modelo/m_login.php';
require_once '../../Modelo/m_valida.php';
require_once '../../Controlador/c_cargarlogin.php';
include_once '../links.php';
?>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Crear Login</title>
  <?php include_once '../links.php';?>
</head>
<script type="text/javascript">
  $(document).ready(function() {
    $('email#input_email, password#password, password1').characterCounter();
  });

function Enviar(){

    var input_email = document.getElementById("input_email").value;
    var  password1= document.getElementById("password1").value;
    var password2 = document.getElementById("password2").value;

    jQuery.ajax({
        type: 'POST',
        url:'../../Controlador/c_insertarlogin.php',
        async: true,
        data:{input_email:input_email,password1:password1,password2:password2},
        success:function(respuesta){
          $('.modal').modal();

            if (respuesta=="Login creado exitosamente") {
            document.getElementById("refe").href="../../index.php";
          }

         $('#resultado').html(respuesta);
            $('#modal1').modal('open');



        },
        error: function () {
            alert("Error inesperado")
            window.top.location ="../index.html";
        }

    });

}
</script>
<body>

<div class="container  teal lighten-5">
  <div class="container-fluid card-panel center-align teal lighten-2"><h4>CREAR AUTENTICACIÓN</h4> </div>
   <div class="container-fluid  center-align ">
      
        <a class="waves-effect waves-light btn-large" href="../index.php" style="width: 40%">Inicio</a>
      </div>
  <form method="post">
    <div class="container  teal lighten-5">

      <div class="container">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="input_email" type="email" data-length="50" name="txt_correo">
            <label for="input_email">Correo</label>
          </div>
        </div>

        <div class="input-field col s12 m12 l12">
          <input type="password" id="password1" data-length="20" name="txt_contrasena"/>
          <label for="password1">Contraseña</label>
        </div>

        <div class="input-field col s12 m12 l12">
          <input type="password" id="password2" data-length="20" name="txt_contrasena2"/>
          <label for="password2">Verificar Contraseña</label>
        </div>

        <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">CREAR USUARIO (LOGIN)
            <i class="material-icons right">send</i>
          </button>
        </div>

   <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mensaje</h4>
      <p id="resultado"></p>
    </div>
    <div class="modal-footer">
      <a id="refe" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    </div>
  </div>
</div>
</div>
  <?php include_once '../footer.php';?>

</body>
</html>

