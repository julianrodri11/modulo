
<?php
session_start();
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_login.php';


$passviejo     = $_POST['txt_pwdold'];
$passnuevo     = $_POST['password1'];
$passnuevo2    = $_POST['password2'];
$correo        = $_SESSION['correo'];
$m_contrasenas = new m_contrasenas();
$m_valida      = new m_valida();
$contrasenav   = sha1($passviejo);

$validatipocorreo=$m_valida->validaCorreo($correo);
$validarcorreoExixte=m_login::validarCorreoExistente($correo);
$validaPassViejo = $m_contrasenas->validarContrasenaVieja("contrasena", $correo, $contrasenav);
$validarigualdad = $m_valida->validaigualdad($passnuevo, $passnuevo2);
$validatamano    = $m_valida->validarLongitudCadena($passnuevo);
$validaSeguridad = $m_valida->validarSeguridadPassword($passnuevo);

//if (!isset($_POST['txt_correo']) || empty($_POST['txt_correo'])) {
if ($correo == '') {
  echo "Favor ingresar correo";
} elseif (!isset($_POST['txt_pwdold']) || empty($_POST['txt_pwdold'])) {
  echo "Favor ingresar Contraseña Actual para continuar con el proceso";
} elseif (!isset($_POST['password1']) || empty($_POST['password1'])) {
  echo "Error, Falta rellenar alguno de los campo de la nueva contraseña";
} elseif (!isset($_POST['password2']) || empty($_POST['password2'])) {
  echo "Error, Falta rellenar alguno de los campo de la nueva contraseña";
} elseif ($validaPassViejo == 2) {
  echo "Error, La contraseña Actual no es la correcta";
} elseif ($validatamano == 2) {
  echo "Error, La longitud de contraseña debe ser mayor o igual a 8";
} elseif ($validaSeguridad == 2) {
  echo "Error, Contraseña insegura, La conytraseña debe tener como minimo 8 caracteres, una mayuscula, una miniscula, un numero y un caracter";
}elseif ($validatipocorreo==2) {
  echo "el correo debe tener ser ingresado de la siguiente manera, micorreo@example.com";
}elseif ($validarcorreoExixte==1) {
  echo "El correo ingresado no existe en la Base de datos";
} 

elseif ($validaSeguridad == 1 and $validatamano == 1 and $validarigualdad == 1) {
  $contrasena = new m_contrasenas();

  $mensaje = m_contrasenas::cambiarContrasena($correo, sha1($passnuevo));
  echo "La contraseña se Actializo exitosamente";
}
