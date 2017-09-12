<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Asistente de instalación</title>
  <?php require_once 'vista/links.php';?>
</head>
<script type="text/javascript">
  /*$(document).ready(function () {
    $('.collapsible').collapsible({
      onOpen: function (el) {
        $('ul.tabs').tabs({"swipeable": true});
      }
    });
  });*/
  $(document).ready(function() {
    $('select').material_select();
  });

</script>
<body>




  <ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Iniciar nuevo proyecto Mysql</div>

      <div class="collapsible-body">
        <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3"><a href="#test1">Seleccione Motor de base de datos</a></li>
              <li class="tab col s3"><a href="#test2">Usuario Administrador de Modulo</a></li>

            </ul>
          </div>
          <form method="post" enctype="multipart/form-data" action="autogenerado/escribir.php">
            <div id="test1" class="col s12">
              <div class="container">
                <div class="row">
                  <div class="col l12 s12 m12">                  
                    <!--div class="row">
                      <div class="switch">
                        <select class="icons" name="txt_motor" required="required">
                          <option value="" disabled selected>Seleccione Motor</option>
                          <option value="mysql" data-icon="images/sample-1.jpg" class="circle">Mysql</option>
                          <option value="pgsql" class="circle">Postgres</option>
                        </select>
                        <label>Images in select</label>
                      </div>
                    </div-->
                    
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
                        <input id="icon_prefix" type="text" class="validate" required="required" name="txt_usuario" value="root">
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
                        <input id="icon_prefix" type="number" class="validate" required="required" name="txt_puerto" value="3306" placeholder="3306">
                        <label for="icon_prefix">Puerto</label>
                      </div>

                    </div>

                    <div class="row">

                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Cargar</span>
                          <input type="file" name="archivos"
                          >

                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                          <label for="icon_prefix">Por favor seleccione la base de datos</label>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <label for="">Por favor seleccione la base de datos<br>Por favor seleccione la base de datos<br>
                        Por favor seleccione la base de datos<br></label>
                        <div class="file-field input-field">

                          <div class="btn">
                            <span>Cargar</span>
                            <input type="file" name="urlmotor"
                            >

                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                            <label for="icon_prefix">Por favor seleccione la base de datos</label>

                          </div>
                        </div>

                      </div>                  


                    </div>
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

</body>
</html>