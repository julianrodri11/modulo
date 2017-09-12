<?php session_start();
require_once './../Modelo/Conexion.php';
require_once './../Modelo/m_consultas.php';
require_once './../Modelo/m_login.php';
require_once './../Modelo/m_valida.php';
require_once './../Controlador/c_cargarlogin.php';
include_once '../vista/links.php';

$traerIdlogin = m_consultas::get_idCorreo($_SESSION['correo']);
$validarRoor  = m_login::validarRoor($traerIdlogin);

if ($validarRoor == 2) {

  header('location:../index.php');

} elseif ($validarRoor == 1) {

  $usuario = $_SESSION['usuario'];

  if (isset($_GET['idlogin'])) {
    $modelo  = new m_login();
    $idlogin = $_GET['idlogin'];
    $filas   = $modelo->get_editarLogin($idlogin);

    ?>
<script>

 $(document).ready(function() {
    $('select').material_select();
  });

    function Enviar(){


      var correo = document.getElementById("correo").value;
      var estado = document.getElementById("estado").value;
      var idlogin = document.getElementById("idlogin").value;

      jQuery.ajax({
        type: 'POST',
        url:'c_cambiarestadologin.php',
        async: true,
        data:{estado:estado,correo:correo,idlogin:idlogin},
        success:function(respuesta){
          $('.modal').modal();

  if (respuesta=="El estado a sido cambiado Correctamente") {
            document.getElementById("refe").href="../vista/formularios/frm_buscarlogin.php";
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
  <?php include_once '../vista/menu.php';?>
  <?php

    #public function get_campo($tabla, $vercolumna1, $condcolumna1, $valor1)
    foreach ($filas as $fila) {
      ?>
    <div class="container  teal lighten-5">
    <div class="container-fluid card-panel center-align teal lighten-2"><h4>ACTUALIZAR AUTENTICACIÓN</h4> </div>
      <div class="container-fluid  center-align ">
        <a class="waves-effect waves-light btn-large" href="../vista/formularios/frm_buscarlogin.php" style="width: 40%">Listar Autenicaciones</a>
        <a class="waves-effect waves-light btn-large" href="../index.php" style="width: 40%">Inicio</a>
      </div>
      </br>


      <form  method="post">
       <div class="container  teal lighten-5">
            <div class="container">
      MODULO<br>

      <input disabled id="correo" name="txt_modulo" type="text"  value=<?php echo $fila['correo']; ?> />

      <br/>

      <div class="input-field col s12">
            <select name="estado" id="estado">
                <option value="" disabled selected>Seleccionar</option>
                  <option value="ACTIVO">ACTIVO</option>
                  <option value="INACTIVO">INACTIVO</option>
            </select>
            <label>Estado</label>
        </div>

      <input id="idlogin" name="txt_idusuario"  type="hidden" value=<?php echo $idlogin; ?> />

      <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">Actualizar Información
            <i class="material-icons right">send</i>
          </button>
        </div>


        <!-- Modal Structure -->



        <br/>
      </div>
   
    </div>
  </form>
</div>

  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mensaje</h4>
      <p id="resultado"></p>
    </div>
    <div class="modal-footer">
      <a id="refe" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    </div>
  </div>
    <?php
}
  }

}
