<!DOCTYPE html>
<?php

session_start();
require_once 'Modelo/Conexion.php';
require_once 'Modelo/m_contrasenas.php';
require_once 'Modelo/m_valida.php ';
require_once 'Modelo/m_perfiles.php ';
require_once 'Modelo/m_opciones.php ';
require_once 'Modelo/m_modulos.php ';
require_once 'Modelo/m_consultas.php ';
require_once 'Modelo/m_login.php ';


if (!isset($_SESSION['correo']) || empty($_SESSION['correo'])) {
  $_SESSION['correo'] = 0;

if (!isset($_SESSION['estado']) || empty($_SESSION['estado'])) {
  $_SESSION['estado'] = "ACTIVO";
}

$usuario = $_SESSION['estado'];
if ($_SESSION['estado'] == "INACTIVO") {
  header('location:error.php');
} else {
  ?>


  <html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modulos de Seguridad</title>

	<script type="text/javascript">
  $(document).ready(function() {
    $('text#nombre, text#descripcion').characterCounter();
  });





function Enviar(){

    var txt_correo = document.getElementById("correo").value;
    var txt_contrasena= document.getElementById("password").value;




      jQuery.ajax({
        type: 'POST',
        url:'Controlador/c_iniciarsesionlogin.php',
        async: true,
        data:{txt_correo:txt_correo,txt_contrasena:txt_contrasena},
        success:function(respuesta){
          $('.modal').modal();

          if (respuesta=="Bienvenido Administrador") {
            document.getElementById("refe").href="vista/index.php";
          }

if (respuesta=="Es nesesario actualizar los datos, Por favor Presione Aceptar para Hacerlo") {
	            document.getElementById("refe").href="vista/formularios/frm_actualizardatos.php";
          }
          if (respuesta=="Bienvenido") {
            document.getElementById("refe").href="vista/frm_menu.php";
           
          }
           if (respuesta== "Su IP a sido bloqueada, Usted a sobrepasado el numero de intentos permitidos, Por favor intente ingresar nuevamente dentro de 30 segundos") {
            document.getElementById("refe").href="error.php";
          }

          $('#resultado').html(respuesta);
            $('#modal1').modal('open');

    		
     document.getElementById("correo").value='';
     document.getElementById("password").value='';

        },
        error: function () {
            alert("Error inesperado")
            window.top.location ="../index.html";
        }

    });

}
</script>
</head>
<?php include_once "vista/links.php";?>
<body class="teal lighten-2">
	<div class="container">
		<div class="row">
			<div class="col s12 m3 l3"></div>
			<div class="col s12 m7 l5 card-panel">
					<div class="col s12 m12 l11 center-align"><i class="material-icons prefix large">lock_outline</i></div>
					<div class="col s12 m12 l11 center-align"><h5>Sistema de Gestión de Usuarios</h5></div>

					<form method="post" onkeypress="if (event.keyCode == 13) Enviar();" >
					<div class="col s12 m12 l12">
						<div class="input-field col s12 m12 l11">
							<i class="material-icons prefix">account_circle</i>
							<input id="correo" type="email" class="validate" required="required" name="txt_correo" value="">
							<label for="icon_prefix">Usuario o Correo</label>
						</div>

					</div>
					<div class="col s12 m12 l12">
						<div class="input-field col s12 m12 l11">
							<i class="material-icons prefix">visibility_off</i>
							<input id="password" type="password" class="validate" required="required" name="txt_contrasena" value="">
							<label for="icon_prefix">Contraseña</label>
						</div>
					</div>





				<div class="col s12 m12 l12">
        <div class="input-field col s12 m12 l12">
          <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action" style="width: 100%">INICIAR SESIÓN
            <i class="material-icons right">send</i>
          </button>
        </div>	</div>
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
						<br><br>
					</div>
				
					
 <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mensaje</h4>
      <p id="resultado"></p>
    </div>
    <div class="modal-footer">
      <a  id="refe" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
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

</body>
</html>
<?php
}
}elseif ($_SESSION['correo']!='') {
	$traerIdlogin = m_consultas::get_idCorreo($_SESSION['correo']);
$validarRoor  = m_login::validarRoor($traerIdlogin);

if ($validarRoor==1) {
header('location:vista/index.php');
}
if ($validarRoor==2) {
	header('location:vista/frm_menu.php');

}
}







