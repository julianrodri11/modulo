<?php
session_start();
if (!isset($_SESSION["usuario"])) {

  header('location:../index.php');

} else {?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Activar/Desactivar Login</title>
  <?php include_once '../links.php';?>
</head>
<script type="text/javascript">
  $(document).ready(function() {
    $('input#input_text, password#password, password1, identificacion, pnombre, snomombre, papellido, sapellido, fnacimiento').characterCounter();
  });

 $(document).ready(function() {
    $('select').material_select();
  });


 $(document).ready(function() {
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
 });



  function Enviar(){

      var selectTipoId = document.getElementById("selectTipoId").value;
      var identificacion = document.getElementById("identificacion").value;
      var pnombre = document.getElementById("pnombre").value;
      var snombre = document.getElementById("snombre").value;
      var papellido = document.getElementById("papellido").value;
      var sapellido = document.getElementById("sapellido").value;
      var fechanacimiento=document.getElementById("fechanacimiento").value;

      jQuery.ajax({
        type: 'POST',
        url:'../../Controlador/c_actualizardatoslogin.php',
        async: true,
        data:{selectTipoId:selectTipoId,identificacion:identificacion,pnombre:pnombre,snombre:snombre,papellido:papellido,sapellido:sapellido,fechanacimiento:fechanacimiento},
        success:function(respuesta){
          $('.modal').modal();

  if (respuesta=="Datos Ingresados correctamente") {
            document.getElementById("refe").href="../frm_menu.php";
          }
          $('#resultado').html(respuesta);
          $('#modal1').modal('open');

        },
        error: function () {
//          alert("Error inesperado")
  //        window.top.location ="../index.html";
        }

      });

    }

</script>
<body>

  <form method="post">
  <div class="container  teal lighten-5">

    <div class="container">

      <div class="container-fluid teal lighten-2 center-align">
        <div class="row">
            <label style="color: #FFF;">ACTUALIZAR DATOS DE PERFIL</label>
          </div>
      </div>

      <div class="input-field col s12 " >
            <select id="selectTipoId" name="txt_tipoidentificacion">
                <option value="" disabled selected>Seleccionar</option>
                  <option value="T.I">T.I</option>
                  <option value="C.C">C.C</option>
            </select>
            <label>Tipo Identificacion</label>
        </div>

        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="identificacion" type="text" data-length="10" name="txt_numeroidentificacion">
            <label for="identificacion">N° Identificación</label>
          </div>
        </div>

          <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="pnombre" type="email" data-length="20" name="txt_primernombre">
            <label for="pnombre">Primer Nombre</label>
          </div>
        </div>

         <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="snombre" type="email" data-length="20" name="txt_segundonombre">
            <label for="snombre">Segundo Nombre</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="papellido" type="email" data-length="20" name="txt_primerapellido">
            <label for="papellido">Primer Apellido</label>
          </div>
        </div>

         <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="sapellido" type="email" data-length="20" name="txt_primerapellido">
            <label for="papellido">Segundo Apellido</label>
          </div>
        </div>


     <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="fechanacimiento"type="text" class="datepicker">
            <label for="fnacimiento">Fecha Nacimiento</label>
          </div>
        </div>


         <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">Actualizar Información
            <i class="material-icons right">send</i>
          </button>
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
      <a id="refe" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    </div>
  </div>

  <?php include_once '../footer.php';?>
</body>
</html>
<?php }?>