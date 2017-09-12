
<?php session_start();
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_consultas.php';
require_once '../Modelo/m_login.php';
require_once '../Modelo/m_valida.php';
require_once '../Controlador/c_cargarlogin.php';
include_once 'links.php';

$traerIdlogin = m_consultas::get_idCorreo($_SESSION['correo']);
$validarRoor  = m_login::validarRoor($traerIdlogin);

if ($validarRoor == 2) {

  header('location:../index.php');

} elseif ($validarRoor == 1) {

  $usuario = $_SESSION['usuario'];

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Sistema de administración de usuarios
	</title>
	<?php include_once 'links.php';?>
</head>
<body>

<?php

?>
	<?php include_once 'menu.php';?>
	<?php include_once 'opciones.php';?>
	<?php include_once 'footer.php';?>

</body>
</html>
<?php } ?>