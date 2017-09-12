
<?php session_start();
require_once '../../Modelo/Conexion.php';
require_once '../../Modelo/m_consultas.php';
require_once '../../Modelo/m_login.php';
require_once '../../Modelo/m_valida.php';
require_once '../../Modelo/m_opciones.php';
require_once '../../Controlador/c_cargaropciones.php';
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
  <title>Ver Perfiles</title>
  <script type="text/javascript">
  $(document).ready(function() {
    $('input#input_text, textarea#textarea1').characterCounter();
  });

   $(document).ready(function() {
    $('select').material_select();
  });

</script>
</head>
<body>
<?php include_once '../menu.php';?>
<form method="get">
<div class="container  teal lighten-5">

      <div class="container-fluid card-panel  teal lighten-2 center-align">
        <div class="row">
            <label style="color: #FFF;"><h5>BUSCAR OPCIÓNES</h5></label>
          </div>
      </div>
       <div class="container-fluid  center-align ">
        <a class="waves-effect waves-light btn-large" href="frm_crearopcion.php" style="width: 40%">Agregar Opción</a>
        <a class="waves-effect waves-light btn-large" href="../index.php" style="width: 40%">Inicio</a>
      </div>

        <div class="container">


        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="input_text" type="text" data-length="10" name="buscar">
            <label for="input_text">BUSCAR POR NOMBRE O ID
            </label>
          </div>
        </div>


        <div class="input-field col s12 m12 l12">
              <button class="btn waves-effect waves-light"  type="submit" name="action">BUSCAR
                <i class="material-icons right">send</i>
              </button>
            </div>
            </div>


</form>

<?php
if (isset($_GET['buscar'])) {
    buscar($_GET['buscar']);
  }
  cargarOpciones();
  ?>


  <?php include_once '../footer.php';?>


</div>
</body>
</html>
<?php }?>