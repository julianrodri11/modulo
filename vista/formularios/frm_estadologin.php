
<?php session_start();
require_once '../../Modelo/Conexion.php';
require_once '../../Modelo/m_consultas.php';
require_once '../../Modelo/m_login.php';
require_once '../../Modelo/m_valida.php';
require_once '../../Controlador/c_cargarlogin.php';
include_once '../links.php';

$traerIdlogin = m_consultas::get_idCorreo($_SESSION['correo']);
$validarRoor  = m_login::validarRoor($traerIdlogin);

if ($validarRoor == 2) {

  header('location:../../index.php');

} elseif ($validarRoor == 1) {

  $usuario = $_SESSION['usuario'];

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Activar/Desactivar Login</title>
  <?php include_once '../links.php';?>
</head>
<script type="text/javascript">
  $(document).ready(function() {
    $('input#input_email, textarea#textarea1').characterCounter();
    $('select').material_select();
  });
   

   function Enviar(){

    var input_email = document.getElementById("input_email").value;
    var  estado= $('#estado').find(":selected").text();



    jQuery.ajax({
        type: 'POST',
        url:'../../Controlador/c_cambiarestadologin.php',
        async: true,
        data:{input_email:input_email,estado:estado},
        success:function(respuesta){
          $('.modal').modal();

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
<?php include_once '../menu.php';?>
  <form method="post">
  <div class="container  teal lighten-5">

      <div class="container-fluid card-panel  teal lighten-2 center-align">
        <div class="row">
            <label style="color: #FFF;"><h5>ACTIVAR O DESACTIVAR USUARIO</h5></label>
          </div>
      </div>

        <div class="container">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="input_email" type="email" data-length="20" name="txt_correo">
            <label for="input_email">Correo</label>
          </div>
        </div>

         <div class="input-field col s12">
            <select name="estado" id="estado">
                <option value="" disabled selected>Seleccionar</option>
                  <option value="ACTIVO">ACTIVO</option>
                  <option value="INACTIVO">INACTIVO</option>
            </select>
            <label>Estado</label>
        </div>

    <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">CAMBIAR ESTADO
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
<?php }?>