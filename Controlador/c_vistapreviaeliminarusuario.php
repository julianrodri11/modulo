<?php session_start();
require_once './../Modelo/Conexion.php';
require_once './../Modelo/m_consultas.php';
require_once './../Modelo/m_login.php';
require_once './../Modelo/m_valida.php';
require_once './../Modelo/m_usuarios.php';
require_once './../Controlador/c_cargarlogin.php';
include_once '../vista/links.php';

$traerIdlogin = m_consultas::get_idCorreo($_SESSION['correo']);
$validarRoor  = m_login::validarRoor($traerIdlogin);

if ($validarRoor == 2) {

  header('location:../index.php');

} elseif ($validarRoor == 1) {

  $usuario = $_SESSION['usuario'];

  if (isset($_GET['idusuario'])) {
    $modelo    = new m_usuarios();
    $idusuario = $_GET['idusuario'];
    $filas     = $modelo->get_datos2($idusuario);
    ?>
    <script>
      $(document).ready(function() {
        $('select').material_select();
      });

      function Enviar(){


        var idusuario = document.getElementById("idusuario").value;

        jQuery.ajax({
          type: 'POST',
          url:'c_eliminarusuario.php',
          async: true,
          data:{idusuario:idusuario},
          success:function(respuesta){
            $('.modal').modal();


            if (respuesta=="Registro eliminado correctamente" | respuesta=="Error, Perfil esta referenciada en otras Tablas") {
              document.getElementById("refe").href="../vista/formularios/frm_buscarusuario.php";
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
    $perf = new m_login();

    $registroP = $perf->traerPerfiles();
    $countP    = count($registroP);
    include_once '../vista/menu.php';

    #public function get_campo($tabla, $vercolumna1, $condcolumna1, $valor1)
    foreach ($filas as $fila) {
      ?>  <div class="container  teal lighten-5">
      <div class="container-fluid card-panel center-align teal lighten-2"><h4>DATOS DE USUARIO A ELIMINAR</h4> </div>
      <div class="container-fluid  center-align ">
        <a class="waves-effect waves-light btn-large" href="../vista/formularios/frm_buscarusuario.php" style="width: 40%">Listar Usuarios</a>
        <a class="waves-effect waves-light btn-large" href="../vista/index.php" style="width: 40%">Inicio</a>
      </div>
      <br>


      <form method="post">

        <div class="container">
          IDENTIFICACIÓN<br>
          <input disabled id="identificacion" name="txt_identificacion" type="text"  value='<?php echo $fila['numeroid']; ?>' />
          <br/>
          NOMBRE
          <input disabled id="nombre1" name="txt_nombre1" type="text" value= '<?php echo $fila['nombre1']; ?>'  />
          <br/>
          APELLIDO
          <input disabled id="apellido1" name="txt_apellido1" type="text" value='<?php echo $fila['apellido1']; ?>' />
          <br/>



          <div class="input-field col s12 " >
            <select disabled id="selecperfil" name="selecperfil">
              <option  disabled selected value="<?php echo $fila['idperfil']; ?>"> <?php echo $fila['perfil']; ?></optio>

                <option  disabled value=<?php echo $registroP[$i][0]; ?>><?php echo $registroP[$i][1]; ?></option>

              </select>


              <label>PERFIL</label>
            </div>
            FECHA DE NACIMIENTO
            <input disabled id="fechanacimiento" name="txt_fechanacimiento" type="date" value='<?php echo $fila['fechanacimiento']; ?>'/>
            <br/>

            <input id="idusuario" name="txt_idusuario"  type="hidden" value=<?php echo $idusuario; ?> />


            <div class="input-field col s12 m12 l12">
              <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">Eliminar Definitivamente
                <i class="material-icons right">send</i>
              </button>
            </div>


            <!-- Modal Structure -->



       
          </div>
         
          
          </form>
<?php include_once '../vista/footer.php';?>

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
