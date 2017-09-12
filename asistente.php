<?php

require_once 'Modelo/Conexion.php';
require_once 'Modelo/m_consultas.php';
require_once 'Modelo/m_login.php';
require_once 'Modelo/m_valida.php';
require_once 'Controlador/c_cargarlogin.php';
include_once 'vista/links.php';

?>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Crear Funcion</title>

</head>
<script type="text/javascript">

  $(document).ready(function() {
    $('text#nombre, text#descripcion').characterCounter();
    $('select').material_select();
  });


function Enviar(){

//var  motor= $('#SelectMotor').find(":selected").text();
  var  motor="mysql";
    var usuario = document.getElementById("usuario").value;
    var pass = document.getElementById("pass").value;
    var host = document.getElementById("host").value;
    var port = document.getElementById("port").value;
    var basededatos = document.getElementById("basededatos").value;

      jQuery.ajax({
        type: 'POST',
        url:'Controlador/c_verificarConexion.php',
        async: true,
        data:{usuario:usuario,pass:pass,host:host,port:port,motor:motor,basededatos:basededatos},
        success:function(respuesta){
          $('.modal').modal();

             if (respuesta=="conexion establecida") {
            $('#resul').attr("disabled", false);
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

<ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Iniciar nuevo proyecto.</div>
      <div class="collapsible-body">
        <div class="row">  <ul class="tabs">
              <li class="tab col s3"><a href="#test1">Seleccione Motor de base de datos</a></li>
              <li class="tab col s3"><a href="#test2">Usuario Administrador de Modulo</a></li>

            </ul>

 <form method="post" enctype="multipart/form-data" action="autogenerado/escribir.php">
  <div id="test1" class="col s12">
         <div class="container">
              <div class="row">
                      <div class="input-field col s12 m12 l11">
                        <!--i class="material-icons prefix">account_circle</i-->
                        <input style="display: none;" id="icon_prefix" type="text" class="validate" required="required" name="txt_motor" value="mysql">
                        <label for="icon_prefix">Motor de base de datos mysql</label>
                      </div>
                    </div>

             <div class="row">
                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="usuario" type="text" class="validate" required="required" name="txt_usuario" value="">
                        <label for="usuario">usuario de conexion</label>
                      </div>
                    </div>

<div class="row">
                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">visibility_off</i>
                        <input id="pass" type="password" class="validate" name="txt_contrasena" value="">
                        <label for="pass">Contraseña</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">dns</i>
                        <input id="host" type="text" class="validate" required="required" name="txt_host" value="">
                        <label for="host">host</label>
                      </div>
                    </div>
                      <div class="row">

                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">view_carousel</i>
                        <input id="port" type="number" class="validate" required="required" name="txt_puerto" value="" placeholder="3306,5432">
                        <label for="port">Puerto</label>
                      </div>

                    </div>
                      <div class="row">

                       <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">view_carousel</i>
                        <input id="basededatos" type="text" class="validate" required="required" name="txt_bd" placeholder="" value="">
                        <label for="basededatos">Nombre de la base de datos</label>
                      </div>

                    </div>
                      <div class="row">

                      <!--div class="file-field input-field">
                        <div class="btn">
                          <span>Cargar</span>
                          <input type="file" name="archivos"
                          >

                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                          <label for="icon_prefix">Por favor seleccione la base de datos</label>
                        </div>
                      </div-->


                    </div>
                       <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">verificar conexion
            <i class="material-icons right">send</i>
          </button>
        </div>




      </div>
      </div>
<div id="test2" class="col s12">

              <div class="row">
                <div class="input-field col s12 m12 l11">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate" required="required" name="txt_usuario_adm" value="">
                  <label for="icon_prefix">Correo usuario de Master</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m12 l11">
                  <i class="material-icons prefix">visibility_off</i>
                  <input id="icon_prefix" type="password" class="validate" name="txt_contrasena_adm" value="">
                  <label for="icon_prefix">Contraseña Usuario Master</label>
                </div>
              </div>



          <div class="input-field col s12 m12 l12">
          <button id="resul" class="btn waves-effect waves-light"  type="submit" name="crear" disabled="disabled">crear modulo
            <i class="material-icons right">send</i>
          </button>
        </div>

            </div>
</form>

          </div>
        </div>
      </li>

    </ul>
     <ul class="collapsible popout" data-collapsible="accordion">
      <li>
        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Iniciar nuevo proyecto Postgres</div>

        <div class="collapsible-body">
          <div class="row">
            <div class="col s12">
              <ul class="tabs">
                <li class="tab col s3"><a href="#test3">Primer Paso Parametros de conexion</a></li>
                <li class="tab col s3"><a href="#test4">Segundo Paso Uaurios administrador</a></li>

              </ul>
            </div>
            <form method="post" enctype="multipart/form-data" action="autogenerado/escribir_postgres.php">
              <div id="test3" class="col s12">
                <div class="container">
                  <div class="row">
                    <div class="col l12 s12 m12">

                      <div class="row">

                        <div class="file-field input-field">
                          <div class="row">
                            <p>1 Crear una base de datos con con cualquier nombre</p>
                          </div>

                          <div class="row">
                            <p>2 restaurar el backup ubicado en la carpeta modulo/autogenado/bd_postgres con encoding UTF-8</p>
                          </div>

                          <div class="row">
                            <p>3 Colocar en el campo "Nombre de la base de datos" el nombre de la base de datos en la cual se restauro el backup </p>
                          </div>
                        </div>

                      </div>

                    </div>

                    <div class="row">
                      <div class="input-field col s12 m12 l11">
                        <!--i class="material-icons prefix">account_circle</i-->
                        <input style="display: none;" id="icon_prefix" type="text" class="validate" required="required" name="txt_motor" value="pgsql">
                        <label for="icon_prefix">Motor de base de datos postgres</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate" required="required" name="txt_usuario" value="postgres">
                        <label for="icon_prefix">usuario de conexion</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">visibility_off</i>
                        <input id="icon_prefix" type="password" class="validate" name="txt_contrasena" value="">
                        <label for="icon_prefix">Contraseña</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">dns</i>
                        <input id="icon_prefix" type="text" class="validate" required="required" name="txt_host" value="localhost">
                        <label for="icon_prefix">host</label>
                      </div>
                    </div>
                    <div class="row">

                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">view_carousel</i>
                        <input id="icon_prefix" type="text" class="validate" required="required" name="txt_bd" placeholder="localhost" value="borrar2">
                        <label for="icon_prefix">Nombre de la base de datos</label>
                      </div>

                    </div>
                    <div class="row">

                      <div class="input-field col s12 m12 l11">
                        <i class="material-icons prefix">view_carousel</i>
                        <input id="icon_prefix" type="number" class="validate" required="required" name="txt_puerto" value="5432" placeholder="5432">
                        <label for="icon_prefix">Puerto</label>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>



            <div id="test4" class="col s12">

              <div class="row">
                <div class="input-field col s12 m12 l11">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate" required="required" name="txt_usuario_adm" value="julianrodri11@gmail.com">
                  <label for="icon_prefix">Correo usuario de Master</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m12 l11">
                  <i class="material-icons prefix">visibility_off</i>
                  <input id="icon_prefix" type="password" class="validate" name="txt_contrasena_adm" value="123">
                  <label for="icon_prefix">Contraseña Usuario Master</label>
                </div>
              </div>

              <button class="btn waves-effect waves-light" type="submit" name="crear">Crear conexion
                <i class="material-icons right">send</i>
              </button>

            </div>
          </form>

        </div>
      </div>
    </li>


  </ul>
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

</body>
</html>