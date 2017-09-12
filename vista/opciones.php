
  <link rel="stylesheet" href="css/styleTable.css">
  <?php


if (!isset($_SESSION["usuario"])) {

  header('location:../index.php');

} else {
  $usuario = $_SESSION['usuario'];?>
	<div class="container">
	<div class="row">

		<div class="col s6 m4 l3 center-align "><a href="formularios/frm_buscarlogin.php"><div class="card-panel">
		<i class="large material-icons indigo-text text-accent-2">phonelink_lock</i><br/>AUTENTICACIÓN </div></a></div>

		<div class="col s6 m4 l3 center-align "><a href="formularios/frm_buscarusuario.php"><div class="card-panel">
		<i class="large material-icons  lime-text text-lighten-1">supervisor_account</i><br>USUARIOS</br></div></a></div>

		<div class="col s6 m4 l3 center-align "><a href="formularios/frm_buscarperfil.php"><div class="card-panel">
		<i class="large material-icons orange-text text-lighten-1">work</i><br>PERFILES</br></div></a></div>

		<div class="col s6 m4 l3 center-align "><a href="formularios/frm_buscarmodulo.php"><div class="card-panel">
		<i class="large material-icons  lime-text text-lighten-1">apps</i><br>MÓDULOS</br></div></a></div>

		<div class="col s6 m4 l3 center-align "><a href="formularios/frm_buscaropciones.php"><div class="card-panel">
		<i class="large material-icons orange-text text-lighten-1">list</i><br>OPCIONES</br></div></a></div>

		<div class="col s6 m4 l3 center-align "><a href="formularios/frm_asociarperfiles.php"><div class="card-panel">
		<i class="large material-icons orange-text text-lighten-1">recent_actors</i><br>ASOCIAR PERFILES MÓDULOS Y OPCIONES  </br></div></a></div>

		<div class="col s6 m4 l3 center-align "><a href="formularios/frm_recuperacontrasena.php"><div class="card-panel">
		<i class="large material-icons  red-text text-lighten-1">vpn_key</i><br>CONTRASEÑAS</br></div></a></div>

		<!--div class="col s6 m4 l3 center-align "><a href="index.php"><div class="card-panel">
		<i class="large material-icons green-text text-lighten-1">email</i><br>NOTIFICACIONES</br></div></a></div-->

		<div class="col s6 m4 l3 center-align "><a href="../Controlador/c_backupmysql.php"><div class="card-panel">
		<i class="large material-icons light-blue-text text-lighten-1">replay_10</i><br>BACKUPS</br></div></a></div>

		<!--div class="col s6 m4 l3 center-align "><a href="index.php"><div class="card-panel">
		<i class="large material-icons yellow-text text-lighten-1">visibility</i><br>AUDITORIAS</br></div></a></div-->


	</div>
</div>

<?php }?>
