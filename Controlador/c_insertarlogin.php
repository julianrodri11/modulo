<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_consultas.php ';
require_once '../Modelo/m_login.php';

$mensaje = null;
#hace falta validar con el fi de una linea si es tiene algo entonces lo mande de lo contrario null

$correo     = $_POST['input_email'];
$passnuevo  = $_POST['password1'];
$passnuevo2 = $_POST['password2'];

$correo = m_valida::caracteres($correo);

$validaCorreoValido = m_valida::validaCorreo($correo);
$validarDatoExistente = m_login::validarCorreoExistente($correo);

$validarigualdad = m_valida::validaigualdad($passnuevo, $passnuevo2);
$validatamano    = m_valida::validarLongitudCadena($passnuevo);
$validaSeguridad = m_valida::validarSeguridadPassword($passnuevo);

if ($correo == '') {
  echo "Favor Ingresar Correo";
} elseif ($passnuevo == '') {
  echo "Error, Falta rellenar alguno de los campo de la nueva contraseña";
} elseif ($passnuevo2 == '') {
  echo "Error, Falta rellenar alguno de los campo de la nueva contraseña";
} elseif ($validaCorreoValido == 2) {
  echo "Error, Correo no Invalido, El correo debe estar de la siguiente manera, nombredecorre@example.com";
} elseif ($validarDatoExistente == 2) {
  echo "El Correo ya se encuantra registrado";
} elseif ($validatamano == 2) {
  echo "Error, La longitud de contraseña debe ser mayor o igual a 8";
} elseif ($validarigualdad == 2) {
  echo "Error, Las contraseñas no coinciden";
} elseif ($validaSeguridad == 2) {
  echo "Error, Contraseña insegura, La conytraseña debe tener como minimo 8 caracteres, una mayuscula, una miniscula, un numero y un caracter";
} elseif ($validaSeguridad == 1 and $validatamano == 1 and $validarigualdad == 1) {

  $perfilEstandar=2;
  $mensaje = m_login::insertarLogin($correo, $passnuevo);
  $traerId=m_consultas::get_idCorreo($correo);
  $mensaje = m_login::insertarUsuarioLogin($traerId,$perfilEstandar);

  echo "Login creado exitosamente";

}
