<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modulos de Seguridad</title>
</head>
<?php include_once "vista/links.php";?>

<?php
//INICIO DE SESION

//FUNCION PARA MOSTRAR EL FORMULARIO
function mostrar_form()
{
// ESTE ES EL FORMULARIO

  ?>
  <div class="container">
    <div class="row">
      <div class="col s12 m3 l3"></div>
      <div class="col s12 m7 l5 card-panel">
          <div class="col s12 m12 l11 center-align"><i class="material-icons prefix large">lock_outline</i></div>
          <div class="col s12 m12 l11 center-align"><h5>Sistema de Gestión de Usuarios</h5></div>

          <form method="post" action="Controlador/c_iniciarsesionlogin.php">
          <div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l11">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="email" class="validate" required="required" name="txt_correo" value="julianrodri11@gmail.co">
              <label for="icon_prefix">Usuario o Correo</label>
            </div>

          </div>
          <div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l11">
              <i class="material-icons prefix">visibility_off</i>
              <input id="icon_prefix" type="password" class="validate" required="required" name="txt_contrasena" value="123">
              <label for="icon_prefix">Contraseña</label>
            </div>
          </div>

          <div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l11">
              <input type="checkbox" class="filled-in" id="filled-in-box"  />
              <label for="filled-in-box">Recordar Usuario</label>

            </div>
          </div>

          <div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l12"><hr>
              <button class="btn waves-effect waves-light" style="width: 100%" type="submit" name="action">Iniciar Sesión
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
          </form>

          <div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l12">
              <a href="vista/formularios/frm_recuperacontrasena.php" class="btn waves-effect waves-teal" style="width: 100%">Recuperar contraseña</a>
            </div>
          </div>

          <div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l12">
              <a href="vista/formularios/frm_crearlogin.php" class="btn waves-effect waves-teal" style="width: 100%">Registrarse</a>
            </div>
          </div>

          <div class="col s12 m12 l12 center-align">
            <div class="input-field col s12 m12 l12">
              <h6>Iniciar Sesión con:</h6>
            </div>
          </div>
          <!--div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l12">
              <button class="btn waves-effect waves-light  blue darken-1" style="width: 100%" type="submit" name="action">Facebook
                <i class="material-icons right">thumb_up</i>
              </button>
            </div>
          </div>

          <div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l12">
              <button class="btn waves-effect waves-light red darken-1" style="width: 100%" type="submit" name="action">Gmail
                <i class="material-icons right">email</i>
              </button>
            </div>
          </div-->
          <div class="col s12 m12 l12">
            <hr>
          </div>
      </div>
      <div class="col s12 m3 l3"></div>
    </div>
  </div>
<?php
}

//MOSTRAMOS EL FORMULARIO
mostrar_form();
