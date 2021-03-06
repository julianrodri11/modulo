<?php session_start();
require_once './../Modelo/Conexion.php';
require_once './../Modelo/m_consultas.php';
require_once './../Modelo/m_login.php';
require_once './../Modelo/m_opciones.php';
require_once './../Modelo/m_valida.php';
require_once './../Controlador/c_cargarlogin.php';
include_once '../vista/links.php';

$traerIdlogin = m_consultas::get_idCorreo($_SESSION['correo']);
$validarRoor  = m_login::validarRoor($traerIdlogin);

if ($validarRoor == 2) {

  header('location:../index.php');

} elseif ($validarRoor == 1) {

  $usuario = $_SESSION['usuario'];

  if (isset($_GET['idopcion'])) {
    $idopcion = $_GET['idopcion'];
    $filas    = m_opciones::get_editarOpcion($idopcion);

    ?>
    <script>

      function Enviar(){

        var nombre = document.getElementById("nombre").value;
        var ruta = document.getElementById("ruta").value;
        var descripcion = document.getElementById("descripcion").value;
        var idopcion = document.getElementById("idopcion").value;


        jQuery.ajax({
          type: 'POST',
          url:'c_modificaropcion.php',
          async: true,
          data:{nombre:nombre,ruta:ruta,descripcion:descripcion,idopcion:idopcion},
          success:function(respuesta){
            $('.modal').modal();

  if (respuesta=="La Opcion fue Modificada Exitosamente") {
            document.getElementById("refe").href="../vista/formularios/frm_buscaropciones.php";
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
      ?><div class="container  teal lighten-5">
      <div class="container-fluid card-panel center-align teal lighten-2"><h4>ACTUALIZAR OPCIÓN</h4> </div>
        <div class="container-fluid  center-align ">
        <a class="waves-effect waves-light btn-large" href="../vista/formularios/frm_buscaropciones.php" style="width: 40%">Listar Opciónes</a>
        <a class="waves-effect waves-light btn-large" href="../vista/index.php" style="width: 40%">Inicio</a>
      </div>
      <br>

      <div class="container  teal lighten-5">
        <form method="post">

          <div class="container">
            OPCIÓN<br>
            <input id="nombre" name="txt_nombre" type="text"  value='<?php echo $fila['nombre']; ?>' />
            <br/>
            URL
            <input id="ruta" name="txt_ruta" type="text" value= '<?php echo $fila['ruta']; ?>'  />
            <br/>
            DESCRIPCIÓN
            <input id="descripcion" name="txt_descripcion" type="text" value= '<?php echo $fila['descripcion']; ?>'  />
            <br/>
            <input id="idopcion" name="txt_opcion"  type="hidden" value='<?php echo $idopcion; ?>' />

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