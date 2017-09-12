<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_login.php';
require_once '../Modelo/m_valida.php';
require_once '../Modelo/m_consultas.php';
$mensaje           = null;
$mensajeValidacion = null;
#hace falta validar con el fi de una linea si es tiene algo entonces lo mande de lo contrario null

$correo = $_POST['txt_correo'];
$login  = new m_login();
$valida = new m_valida();

$mensajeValidacion  = $login->validarCorreo($correo);
$correo             = $valida->caracteres($correo);
$validaCorreoValido = $valida->validaCorreo($correo);

if (!isset($_POST['txt_correo']) || empty($_POST['txt_correo'])) {
  echo "Favor ingresar correo";
} elseif ($mensajeValidacion == 2) {
  echo "El correo no se encuentra Registrado, Por favor verificar correo";
} elseif ($validaCorreoValido == 2) {
  echo "Error, Correo no Invalido, El correo debe estar de la siguiente manera, nombredecorre@example.com";
}if ($mensajeValidacion == 1 and $validaCorreoValido == 1) {
  $mensajeValidacion = $login->recuperarContrasena($correo);
  if ($mensajeValidacion == 1) {echo "Se ha enviado al correo " . $correo . "  un enlace de recuperación";} else if ($mensajeValidacion == 2) {echo "ERRORSQL, Ocurrio un error inesperado con la Base de datos";}

}
