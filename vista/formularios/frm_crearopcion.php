

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
  <title>Crear Funcion</title>
  <?php include_once '../links.php';?>
</head>
<script type="text/javascript">

  $(document).ready(function() {
    $('text#nombre, text#descripcion').characterCounter();
    $('select').material_select();
  });


function Enviar(){

    var nombre = document.getElementById("nombre").value;
    var  descripcion= document.getElementById("descripcion").value;
    var  idModulo= $("#SelectModulo option:selected").val();
    var  ruta= document.getElementById("ruta").value;


      jQuery.ajax({
        type: 'POST',
        url:'../../Controlador/c_insertaropcion.php',
        async: true,
        data:{nombre:nombre,descripcion:descripcion,ruta:ruta,idModulo:idModulo},
        success:function(respuesta){
          $('.modal').modal();

             if (respuesta=="La Opcion fue creado Exitosamente") {
            document.getElementById("refe").href="../formularios/frm_buscaropciones.php";
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
<?php 
 $modulos  =m_login::traerModulos();

  ?>


<body>
<?php include_once '../menu.php';?> <div class="container  teal lighten-5">
  <div class="container-fluid card-panel center-align teal lighten-2"><h4>AGREGAR OPCION A MODULO</h4> </div>
  <div class="container-fluid  center-align ">
        <a class="waves-effect waves-light btn-large" href="frm_buscaropciones.php" style="width: 40%">Listar Opciones</a>
        <a class="waves-effect waves-light btn-large" href="../index.php" style="width: 40%">Inicio</a>
      </div>

  <form method="post">
   

      <div class="container">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="nombre" type="text" data-length="20" name="txt_nombre">
            <label for="nombre">Nombre de La Funcionalidad</label>
          </div>
        </div>

        <div class="input-field col s12 m12 l12">
          <input type="text" id="descripcion" data-length="60" name="txt_descripcion"/>
          <label for="descripcion">Descripcion de La Funcionalidad</label>
        </div>

         <div class="input-field col s12 " >
          <select onChange="javascript:recargar(this.value)" id="SelectModulo" name="SelectModulo">
            <?php for ($i = 0; $i < count($modulos); $i++) {?>
            <option  value=<?php echo $modulos[$i][0]; ?>><?php echo $modulos[$i][1]; ?></option>
            <?php }?>
          </select>
          </div>

         <div class="input-field col s12 m12 l12">
          <input type="text" id="ruta" data-length="60" name="txt_descripcion"/>
          <label for="descripcion">Ruta</label>
        </div>


        <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">CREAR Funcion
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