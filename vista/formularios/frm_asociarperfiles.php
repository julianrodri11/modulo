
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

<title>Actualizar</title>
<script language="javascript">
$(document).ready(function() {
    $('select').material_select();
  });

function recargar($variable_post){
  var  variable_post= $("#SelectModulo option:selected").val();

  $.post("../../Controlador/c_cargaroperaciones.php", { variable: variable_post }, function(data){


  $("#recargado").html(data);
  $("#SelectOpcion").html(data);
  $('select').material_select('destroy');



$(document).ready(function() {
    $('select').material_select();
  });


  });
}


function Guardar(){

  var  idPerfil= $("#SelectPerfil option:selected").val();
  var  idModulo= $("#SelectModulo option:selected").val();
  var  idOpcion= $("#SelectOpcion option:selected").val();



  $.post("../../Controlador/c_desarrollarfuncion.php", { idPerfil: idPerfil,idModulo:idModulo,idOpcion:idOpcion}, function(data){

    
  $('#resultado').html(data);
            $('#modal1').modal('open');

            ("#SelectPerfil option:selected").val()='';
              ("#SelectModulo option:selected").val()='';
  ("#SelectOpcion option:selected").val()='';


  });
}

</script>




<style type="text/css">
/*
body,td,th {
  color: #333333;
}
#recargado {
  width:400px;
  border:1px solid #CCCCCC;
  margin:auto;
  padding:10px;
}
*/
</style></head>
<body>

<?php

  $respuesta = 0;

  $m_login  = new m_login();
  $perfiles = $m_login->traerPerfiles();
  $modulos  = $m_login->traerModulos();

  ?>



<?php include_once '../menu.php';?>

<form method="post">
  <div class="container  teal lighten-5">

      <div class="container-fluid card-panel  teal lighten-2 center-align">
        <div class="row">
            <label style="color: #FFF;"><h5>ASOCIAR PERFILES</h5></label>
          </div>
      </div>
        <div class="container-fluid  center-align ">
        <a class="waves-effect waves-light btn-large" href="frm_buscarperfil.php" style="width: 40%">Listar Perfiles </a>
        <a class="waves-effect waves-light btn-large" href="../index.php" style="width: 40%">Inicio</a>
      </div>
      <br>
        <div class="container">

          Perfil
          <div class="input-field col s12" >
          <select  id="SelectPerfil" name="SelectPerfil">
           <option >Seleccione Perfil</option>
            <?php for ($i = 0; $i < count($perfiles); $i++) {?>
            <option  value=<?php echo $perfiles[$i][0]; ?>><?php echo $perfiles[$i][1]; ?></option>
            <?php }?>
          </select>
          </div>
        Modulo
        <div class="input-field col s12 " >
          <select onChange="javascript:recargar(this.value)" id="SelectModulo" name="SelectModulo">
           <option >Seleccione Modulo</option>
            <?php for ($i = 0; $i < count($modulos); $i++) {?>
            <option  value=<?php echo $modulos[$i][0]; ?>><?php echo $modulos[$i][1]; ?></option>
            <?php }?>
          </select>
          </div>
      Opcion
        <div class="input-field col s12 " >
            <select id="SelectOpcion" name="SelectOpcion">
                <option >Seleccione Opcion</option>
            </select>

        </div>

         <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="javascript:Guardar();" name="action">Crear
            <i class="material-icons right">send</i>

          </button>
          </div>
        </div></div></div>

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

</body>
</html>
<?php }?>
