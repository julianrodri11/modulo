<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_login.php ';
require_once '../Modelo/m_contrasenas.php';

$validarigualdad = 0;
$validatamaño   = $valida   = 0;
$validaSeguridad = 0;

$passnuevo  = $_POST['password1'];
$passnuevo2 = $_POST['password2'];
$correo     = $_POST['correo'];

$m_contrasenas = new m_contrasenas();
$m_valida      = new m_valida();

$validatipocorreo    = $m_valida->validaCorreo($correo);
$validarcorreoExixte = m_login::validarCorreo($correo);
$validatamano        = $m_valida->validarLongitudCadena($passnuevo);
$validarigualdad     = $m_valida->validaigualdad($passnuevo, $passnuevo2);
$validaSeguridad     = $m_valida->validarSeguridadPassword($passnuevo);

if (!isset($_POST['password1']) || empty($_POST['password1'])) {
  echo "Error, Falta rellenar alguno de los campo de la nueva contraseña";
} elseif (!isset($_POST['password2']) || empty($_POST['password2'])) {
  echo "Error, Falta rellenar alguno de los campo de la nueva contraseña";
} elseif ($validarigualdad == 2) {
  echo "Las contraseñas no coinciden";
} elseif ($validatamano == 2) {
  echo "La longitud de contraseña debe ser mayor o igual a 8";
} elseif ($validaSeguridad == 2) {
  echo "La contraseña debe tener minimo una letra mayuscula, una minuscula y al menos un número. Ejemplo sdfMm9/*";
} elseif ($validatipocorreo == 2) {
  echo "el correo debe tener ser ingresado de la siguiente manera, micorreo@example.com";
} elseif ($validarcorreoExixte == 2) {
  echo "el ingresado no existe en la Base de datos";
} elseif ($validaSeguridad == 1 and $validatamano == 1 and $validarigualdad == 1 and $validatipocorreo == 1 and $validarcorreoExixte == 1) {
  $mensaje = m_contrasenas::cambiarContrasena($correo, sha1($passnuevo));
  echo "La contraseña se cambio exitosamente";
}
