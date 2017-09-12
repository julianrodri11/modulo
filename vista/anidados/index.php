<?php
require_once '../../Modelo/m_login.php';
require_once '../../Modelo/Conexion.php';
require_once '../../Modelo/m_login.php';
include_once '../../vista/links.php';

?>
<head>

<title>Actualizar</title>
<script language="javascript">
$(document).ready(function() {
    $('select').material_select();
  });

function recargar($variable_post){
  var  variable_post= $("#SelectModulo option:selected").val();

  $.post("miscript.php", { variable: variable_post }, function(data){
  $("#recargado").html(data);
  $("#recargaOpciones").html(data);
  $('select').material_select('destroy');

$(document).ready(function() {
    $('select').material_select();
  });


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
$login     = new m_login();
$perfiles  = $login->traerPerfiles();
$modulos   = $login->traerModulos();

?>


<div id="recargado">Mi texto sin recargar</div>
<p align="center">
  <a href="#" onclick="javascript:recargar();">recargar</a>
</p>



<form method="post">
  <div class="container  teal lighten-5">

      <div class="container-fluid card-panel  teal lighten-2 center-align">
        <div class="row">
            <label style="color: #FFF;"><h5>ASOCIAR PERFILES</h5></label>
          </div>
      </div>
        <div class="container">


          <div class="input-field col s12" >
          <select  id="selecperfil" name="selecperfil">
            <?php for ($i = 0; $i < count($perfiles); $i++) {?>
            <option  value=<?php echo $respuesta[$i][0]; ?>><?php echo $perfiles[$i][1]; ?></option>
            <?php }?>
          </select>
          </div>

        <div class="input-field col s12 " >
          <select onChange="javascript:recargar(this.value)" id="SelectModulo" name="SelectModulo">
            <?php for ($i = 0; $i < count($modulos); $i++) {?>
            <option  value=<?php echo $modulos[$i][0]; ?>><?php echo $modulos[$i][1]; ?></option>
            <?php }?>
          </select>
          </div>

        <div class="input-field col s12 " >
            <select id="recargaOpciones" name="recargaOpciones">
                <option value="" selected>SELECCIONAR OPCION</option>

            </select>

        </div>

         <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="javascript:recargar();" name="action">cargar
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
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    </div>
  </div>

</body>
</html>
